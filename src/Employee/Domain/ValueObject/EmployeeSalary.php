<?php

namespace Vocces\Employee\Domain\ValueObject;

final class EmployeeSalary
{
    // Properties
    private string $salary;

    /**
     * Create new instance
     * @param string $salary
     * @return void
     */
    public function __construct(string $salary)
    {
        $this->salary = $salary;
    }

    /**
     * Get the salary
     * @return float
     */
    public function get(): float
    {
        return $this->salary;
    }

    /**
     * Get the salary as string
     * @return string
     */
    public function __toString()
    {
        return $this->salary;
    }
}
