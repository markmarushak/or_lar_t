<h1> Test</h1>

<table>
    <tr>
        @foreach($th as $t)
            <th>
                {{ $t['label'] }}
            </th>
        @endforeach
    </tr>
    @foreach($row as $r)
        <tr>
            @foreach($th as $k)
                  <td>{{ $r[$k['key']] }}</td>
            @endforeach
        </tr>
    @endforeach
</table>


