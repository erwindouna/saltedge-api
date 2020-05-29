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

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param mixed $accountId
     */
    public function setAccountId($accountId): void
    {
        $this->accountId = $accountId;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * @param Carbon $createdAt
     */
    public function setCreatedAt(Carbon $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param mixed $currencyCode
     */
    public function setCurrencyCode($currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDuplicated()
    {
        return $this->duplicated;
    }

    /**
     * @param mixed $duplicated
     */
    public function setDuplicated($duplicated): void
    {
        $this->duplicated = $duplicated;
    }

    /**
     * @return TransactionExtra
     */
    public function getExtra(): TransactionExtra
    {
        return $this->extra;
    }

    /**
     * @param TransactionExtra $extra
     */
    public function setExtra(TransactionExtra $extra): void
    {
        $this->extra = $extra;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Carbon
     */
    public function getMadeOn(): Carbon
    {
        return $this->madeOn;
    }

    /**
     * @param Carbon $madeOn
     */
    public function setMadeOn(Carbon $madeOn): void
    {
        $this->madeOn = $madeOn;
    }

    /**
     * @return mixed
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param mixed $mode
     */
    public function setMode($mode): void
    {
        $this->mode = $mode;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    /**
     * @param Carbon $updatedAt
     */
    public function setUpdatedAt(Carbon $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
