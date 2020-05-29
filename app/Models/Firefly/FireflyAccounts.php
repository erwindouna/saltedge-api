<?php

namespace App\Models\Firefly;

use Illuminate\Database\Eloquent\Model;

class FireflyAccounts extends Model
{
    protected $table = 'firefly_accounts';
    protected $fillable = ['account_id', 'account_name', 'object', 'hash'];
}
