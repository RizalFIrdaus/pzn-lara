<?php

namespace App\Data;

class Person
{
    public function __construct(
        private string $fistName,
        private string $lastName
    ) {
    }

    /**
     * Get the value of fistName
     */
    public function getFistName()
    {
        return $this->fistName;
    }

    /**
     * Set the value of fistName
     */
    public function setFistName($fistName): self
    {
        $this->fistName = $fistName;

        return $this;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     */
    public function setLastName($lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }
}
