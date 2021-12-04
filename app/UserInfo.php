<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'userinfos';
    protected $fillable = ['user_id',
    'country_code',
    'country',
    'city',
    'postal_code',
    'ip_address',
    'latitude',
    'longitude'];

}
