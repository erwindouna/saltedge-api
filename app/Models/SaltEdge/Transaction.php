<?php

namespace App\Models\SaltEdge;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'salt_edge_transactions';
    protected $fillable = ['salt_edge_account_id', 'salt_edge_transaction_id', 'object', 'hash'];
}
