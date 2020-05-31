<?php

namespace App\Models\Firefly;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'firefly_transactions';
    protected $fillable = ['description', 'transaction_id', 'external_id', 'source_name', 'source_iban', 'object', 'hash'];
}
