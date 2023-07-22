<?php

namespace Tests\Vocces\Employee\Infrastructure;

use Vocces\Employee\Domain\Employee;

use Vocces\Employee\Domain\ValueObject\EmployeeStatus;
use Vocces\Employee\Domain\EmployeeRepositoryInterface;

class EmployeeRepositoryFake implements EmployeeRepositoryInterface
{
    // Properties to check if the methods are called
    private bool $callMethodCreate = false;
    private bool $callMethodActivate = false;
    private bool $callMethodList = false;

    // Array to store the fake_employees
    private array $fake_employees = [];

    /**
     * @inheritdoc
     */
    public function create(Employee $employee): void
    {
        // Add the employee to the array
        $this->fake_employees[(string) $employee->id()] = $employee;

        // Set flag to true
        $this->callMethodCreate = true;
    }

    /**
     * @inheritdoc
     */
    public function activate(string $id): ?Employee
    {
        // Find the employee in array
        $employee = $this->fake_employees[$id] ?? null;

        // If the employee is not found, return exception
        if (!isset($this->fake_employees[(string) $employee->id()])) {
            throw new \Exception("Employee with ID {$employee->id()} not found.");
        }

        // Activate the employee
        $employee->setStatus(EmployeeStatus::enabled());

        // Set flag to true
        $this->callMethodActivate = true;

        return $employee;
    }

    /**
     * @inheritdoc
     */
    public function list(): ?array
    {
        // If the employee list is empty, return exception
        if(empty($this->fake_employees) || !is_array($this->fake_employees)) {
            throw new \Exception("Employee list is empty.");
        }

        // Return the employee list
        return $this->fake_employees;
    }
}
