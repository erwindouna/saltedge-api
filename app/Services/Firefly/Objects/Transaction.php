<?php

namespace App\Services\Firefly\Objects;

use App\Services\Firefly\Objects\Transaction\Attributes;

class Transaction
{
    private $transactions;
    private $id;
    private Attributes $attributes;

    public function __construct(array $array)
    {
        $this->transactions = $array['transactions'];
        $this->id = $array['id'];
        $this->attributes = new Attributes($array['attributes']);
    }

    /**
     * @return mixed
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param mixed $transactions
     */
    public function setTransactions($transactions): void
    {
        $this->transactions = $transactions;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return Attributes
     */
    public function getAttributes(): Attributes
    {
        return $this->attributes;
    }

    /**
     * @param Attributes $attributes
     */
    public function setAttributes(Attributes $attributes): void
    {
        $this->attributes = $attributes;
    }
}