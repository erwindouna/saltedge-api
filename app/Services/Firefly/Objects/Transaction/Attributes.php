<?php

namespace App\Services\Firefly\Objects\Transaction;

use Illuminate\Support\Carbon;

class Attributes
{
    private $createdAt;
    private $updatedAt;
    private $user;
    private $group_title;
    private $transactions;

    public function __construct(array $array)
    {
        $this->createdAt = new Carbon($array['created_at']);
        $this->updatedAt = new Carbon($array['updated_at']);
        $this->user = $array['user'];
        $this->group_title = $array['group_title'];
        $this->transactions = new Transactions($array['transactions']);
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

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getGroupTitle()
    {
        return $this->group_title;
    }

    /**
     * @param mixed $group_title
     */
    public function setGroupTitle($group_title): void
    {
        $this->group_title = $group_title;
    }

    /**
     * @return Transactions
     */
    public function getTransactions(): Transactions
    {
        return $this->transactions;
    }

    /**
     * @param Transactions $transactions
     */
    public function setTransactions(Transactions $transactions): void
    {
        $this->transactions = $transactions;
    }
}