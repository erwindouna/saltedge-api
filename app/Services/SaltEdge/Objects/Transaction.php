<?php

namespace App\Services\SaltEdge\Objects;

use Carbon\Carbon;

class Transaction
{
    private $accountId;
    private $amount;
    private $category;
    private $createdAt;
    private $currencyCode;
    private $description;
    private $duplicated;
    private $extra;
    private $id;
    private $madeOn;
    private $mode;
    private $status;
    private $updatedAt;

    /**
     * Transaction constructor.
     * @param array $array
     * @throws \Exception
     */
    public function __construct(array $array)
    {
        $this->id = (int)$array['id'];
        $this->mode = $array['mode'];
        $this->status = $array['status'];
        $this->madeOn = new Carbon($array['made_on']);
        $this->amount = $array['amount'];
        $this->currencyCode = $array['currency_code'];
        $this->description = $array['description'];
        $this->category = $array['category'];
        $this->duplicated = $array['duplicated'];
        $this->extra = new TransactionExtra($array['extra'] ?? []);
        $this->accountId = $array['account_id'];
        $this->createdAt = new Carbon($array['created_at']);
        $this->updatedAt = new Carbon($array['updated_at']);
    }
}
