<?php

namespace Vocces\Employee\Application;

use Vocces\Employee\Domain\Employee;
use Vocces\Employee\Domain\ValueObject\EmployeeId;
use Vocces\Employee\Domain\ValueObject\EmployeeName;
use Vocces\Employee\Domain\ValueObject\EmployeeSurname;
use Vocces\Employee\Domain\ValueObject\EmployeeEmail;
use Vocces\Employee\Domain\ValueObject\EmployeePhone;
use Vocces\Employee\Domain\ValueObject\EmployeeBirthday;
use Vocces\Employee\Domain\ValueObject\EmployeeSalary;
use Vocces\Company\Domain\ValueObject\CompanyId;
use Vocces\Employee\Domain\ValueObject\EmployeeStatus;


use Vocces\Employee\Domain\EmployeeRepositoryInterface;
use Vocces\Shared\Domain\Interfaces\ServiceInterface;

class EmployeeCreator implements ServiceInterface
{
    /**
     * @var EmployeeRepositoryInterface $repository
     */
    private EmployeeRepositoryInterface $repository;

    /**
     * Create new instance
     * @param EmployeeRepositoryInterface $repository
     * @return void
     */
    public function __construct(EmployeeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new employee
     * @param string $id
     * @param string $name
     * @param string $surname
     * @param string $email
     * @param string $phone
     * @param string $birthday
     * @param float $salary
     * @param string $company_id
     * @return Employee
     */
    public function handle($id, $name, $surname, $email, $phone, $birthday, $salary, $company_id)
    {
        $employee = new Employee(
            new EmployeeId($id),
            new EmployeeName($name),
            new EmployeeSurname($surname),
            new EmployeeEmail($email),
            new EmployeePhone($phone),
            new EmployeeBirthday($birthday),
            new EmployeeSalary($salary),
            EmployeeStatus::disabled(),
            new CompanyId($company_id)
        );

        $this->repository->create($employee);

        return $employee;
    }
}
