<?php

namespace App\Services\SaltEdge\Objects;

use Carbon\Carbon;

class Account
{
    private $balance;
    private $createdAt;
    private $currencyCode;
    private $extra = [];
    private $id;
    private $loginId;
    private $name;
    private $nature;
    private $updatedAt;

    public function __construct(array $array)
    {
        $this->id = (int)$array['id'];
        $this->loginId = $array['login_id'];
        $this->currencyCode = $array['currency_code'];
        $this->balance = $array['balance'];
        $this->name = $array['name'];
        $this->nature = $array['nature'];
        $this->createdAt = new Carbon($array['created_at']);
        $this->updatedAt = new Carbon($array['updated_at']);
        $extraArray = is_array($array['extra']) ? $array['extra'] : [];
        foreach ($extraArray as $key => $value) {
            $this->extra[$key] = $value;
        }
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance): void
    {
        $this->balance = $balance;
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
     * @return array
     */
    public function getExtra(): array
    {
        return $this->extra;
    }

    /**
     * @param array $extra
     */
    public function setExtra(array $extra): void
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
     * @return mixed
     */
    public function getLoginId()
    {
        return $this->loginId;
    }

    /**
     * @param mixed $loginId
     */
    public function setLoginId($loginId): void
    {
        $this->loginId = $loginId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNature()
    {
        return $this->nature;
    }

    /**
     * @param mixed $nature
     */
    public function setNature($nature): void
    {
        $this->nature = $nature;
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
