<?php

namespace Vocces\Employee\Domain;

interface EmployeeRepositoryInterface
{
    /**
     * Persist a new employee instance
     *
     * @param Employee $employee
     *
     * @return void
     */
    public function create(Employee $employee): void;

    /**
     * Activate a employee
     *
     * @param string $id
     *
     * @return Employee|null
     */
    public function activate(string $id): ?Employee;

    /**
     * Get employee list
     *
     * @return array|null
     */
    public function list(): ?array;

}
