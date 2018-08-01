<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class EmailNewsLetter extends Model
{
    protected $table = 'email_news_letters';
    protected $fillable = ['data_filter_rule_id', 'output_overview_id'];
}