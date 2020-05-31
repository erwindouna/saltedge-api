<?php

namespace App\Services\Firefly\Objects\Transaction;

use Illuminate\Support\Carbon;

class Attributes
{
    private Carbon $createdAt;
    private Carbon $updatedAt;
    private $user;
    private $group_title;

    public function __construct(array $array)
    {
        $this->createdAt = new Carbon($array['created_at']);
        $this->updatedAt = new Carbon($array['updated_at']);
        $this->user = $array['user'];
        $this->group_title = $array['group_title'];
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
}