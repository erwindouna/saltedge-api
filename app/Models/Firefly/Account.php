<?php

namespace App\Models\Firefly;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'firefly_accounts';
    protected $fillable = ['account_id', 'account_name', 'account_iban', 'account_number', 'object', 'hash'];
}
