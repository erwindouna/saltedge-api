<?php

namespace App\Services\Firefly\Objects\Transaction;

use Illuminate\Support\Carbon;

class Attributes
{
    private $createdAt;
    private $updatedAt;
    private $user;
    private $groupTitle;
    private $transactions;

    public function __construct(array $array)
    {
        $this->createdAt = new Carbon($array['created_at']);
        $this->updatedAt = new Carbon($array['updated_at']);
        $this->user = $array['user'];
        $this->groupTitle = $array['group_title'];
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
        return $this->groupTitle;
    }

    /**
     * @param mixed $groupTitle
     */
    public function setGroupTitle($groupTitle): void
    {
        $this->groupTitle = $groupTitle;
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