<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MadnessCODE\Voluum\Transport\Curl;
use MadnessCODE\Voluum\Client;
use MadnessCODE\Voluum\Exceptions;
use MadnessCODE\Voluum\Response;
use App\Http\Controllers\Test\Responce;


class CurlController extends Curl
{
    public function getCsv($endpint, array $params)
    {
        return $this->curlCsv($this->url . $endpint, 'GET',$params);
    }

    private function curlCsv($url, $request_method, $params, $token = false)
    {
        $curl = curl_init();
        $header = [
            "Content-Type: application/json; charset=utf-8",
            "Accept: text/csv"
        ];

        if (count($params) && $request_method == "GET") {
            $query = http_build_query($params);
            $query = preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D', $query);
            $url .= '/?' . $query;
        }

        if (!$token) {
            $header[] = "cwauth-token: " . $this->client->auth->getToken();
        }

        $setopt_array = array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => $request_method,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => json_encode($params),
            CURLOPT_HTTPHEADER => $header
        );

        curl_setopt_array($curl, $setopt_array);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($error) {
            if ($token == false) {
                throw new Exceptions\AuthException($error);
            } else {
                throw new Exceptions\TransportException($error);
            }
        }

        return new Responce($http_status, $response);
    }
}
