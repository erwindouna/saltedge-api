<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigurationModel extends Model
{
    protected $table = 'configuration';
    protected $fillable = ['name', 'data'];
}
