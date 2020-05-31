<?php

namespace App\Services\Firefly\Objects;

use App\Services\Firefly\Objects\Transaction\Attributes;

class Transaction
{
    private $type;
    private $id;
    private $attributes;

    public function __construct(array $array)
    {
        $this->type = $array['type'];
        $this->id = $array['id'];
        $this->attributes = new Attributes($array['attributes']);
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
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