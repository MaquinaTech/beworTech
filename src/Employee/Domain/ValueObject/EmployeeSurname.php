<?php

namespace Vocces\Employee\Domain\ValueObject;

final class EmployeeSurname
{
    // Properties
    private string $surname;

    /**
     * Create new instance
     * @param string $surname
     * @return void
     */
    public function __construct(string $surname)
    {
        $this->surname = $surname;
    }

    /**
     * Get the surname
     * @return string
     */
    public function get(): string
    {
        return $this->surname;
    }

    /**
     * Get the surname as string
     * @return string
     */
    public function __toString()
    {
        return $this->surname;
    }
}
