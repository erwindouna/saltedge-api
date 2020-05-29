<?php

namespace App\Models\SaltEdge;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'salt_edge_accounts';
    protected $fillable = ['account_id', 'account_name', 'salt_edge_customer_id', 'object', 'hash'];
}
