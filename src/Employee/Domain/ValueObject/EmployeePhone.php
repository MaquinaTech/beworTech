<?php

namespace Vocces\Employee\Domain\ValueObject;

final class EmployeePhone
{
    // Properties
    private string $phone;

    /**
     * Create new instance
     * @param string $phone
     * @return void
     */
    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * Get the phone
     * @return string
     */
    public function get(): string
    {
        return $this->phone;
    }

    /**
     * Get the phone as string
     * @return string
     */
    public function __toString()
    {
        return $this->phone;
    }
}
