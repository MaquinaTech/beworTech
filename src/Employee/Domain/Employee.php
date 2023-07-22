<?php

namespace Vocces\Employee\Domain;

use Vocces\Employee\Domain\ValueObject\EmployeeId;
use Vocces\Employee\Domain\ValueObject\EmployeeName;
use Vocces\Employee\Domain\ValueObject\EmployeeSurname;
use Vocces\Employee\Domain\ValueObject\EmployeeEmail;
use Vocces\Employee\Domain\ValueObject\EmployeePhone;
use Vocces\Employee\Domain\ValueObject\EmployeeBirthday;
use Vocces\Employee\Domain\ValueObject\EmployeeSalary;
use Vocces\Employee\Domain\ValueObject\EmployeeStatus;
use Vocces\Company\Domain\ValueObject\CompanyId;
use Vocces\Shared\Infrastructure\Interfaces\Arrayable;

final class Employee implements Arrayable
{
    /**
     * @var \Vocces\Employee\Domain\ValueObject\EmployeeId
     */
    private EmployeeId $id;

    /**
     * @var \Vocces\Employee\Domain\ValueObject\EmployeeName
     */
    private EmployeeName $name;

    /**
     * @var \Vocces\Employee\Domain\ValueObject\EmployeeSurname
     */
    private EmployeeSurname $surname;

    /**
     * @var \Vocces\Employee\Domain\ValueObject\EmployeeEmail
     */
    private EmployeeEmail $email;

    /**
     * @var \Vocces\Employee\Domain\ValueObject\EmployeePhone
     */
    private EmployeePhone $phone;

    /**
     * @var \Vocces\Employee\Domain\ValueObject\EmployeeBirthday
     */
    private EmployeeBirthday $birthday;

    /**
     * @var \Vocces\Employee\Domain\ValueObject\EmployeeSalary
     */
    private EmployeeSalary $salary;

    /**
     * @var \Vocces\Employee\Domain\ValueObject\EmployeeStatus
     */
    private EmployeeStatus $status;

    /**
     * @var \Vocces\Company\Domain\ValueObject\CompanyId
     */
    private CompanyId $companyId;

    /**
     * Create new instance
     * @param EmployeeId $id
     * @param EmployeeName $name
     * @param EmployeeSurname $surname
     * @param EmployeeEmail $email
     * @param EmployeePhone $phone
     * @param EmployeeBirthday $birthday
     * @param EmployeeSalary $salary
     * @param EmployeeStatus $status
     * @param CompanyId $companyId
     * @return void
     */
    public function __construct(
        EmployeeId $id,
        EmployeeName $name,
        EmployeeSurname $surname,
        EmployeeEmail $email,
        EmployeePhone $phone,
        EmployeeBirthday $birthday,
        EmployeeSalary $salary,
        EmployeeStatus $status,
        CompanyId $companyId
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phone = $phone;
        $this->birthday = $birthday;
        $this->salary = $salary;
        $this->status = $status;
        $this->companyId = $companyId;
    }

    /**
     * Get the employee id
     * @return EmployeeId
     */
    public function id(): EmployeeId
    {
        return $this->id;
    }

    /**
     * Get the employee name
     * @return EmployeeName
     */
    public function name(): EmployeeName
    {
        return $this->name;
    }

    /**
     * Get the employee surname
     * @return EmployeeSurname
     */
    public function surname(): EmployeeSurname
    {
        return $this->surname;
    }

    /**
     * Get the employee email
     * @return EmployeeEmail
     */
    public function email(): EmployeeEmail
    {
        return $this->email;
    }

    /**
     * Get the employee phone
     * @return EmployeePhone
     */
    public function phone(): EmployeePhone
    {
        return $this->phone;
    }

    /**
     * Get the employee birthday
     * @return EmployeeBirthday
     */
    public function birthday(): EmployeeBirthday
    {
        return $this->birthday;
    }

    /**
     * Get the employee salary
     * @return EmployeeSalary
     */
    public function salary(): EmployeeSalary
    {
        return $this->salary;
    }

    /**
     * Get the employee status
     * @return EmployeeStatus
     */
    public function status(): EmployeeStatus
    {
        return $this->status;
    }

    /**
     * Get the employee company id
     * @return CompanyId
     */
    public function companyId(): CompanyId
    {
        return $this->companyId;
    }

    /**
     * Set the employee status
     * @param EmployeeStatus $status
     * @return void
     */
    public function setStatus(EmployeeStatus $status): void
    {
        $this->status = $status;
    }

    /**
     * Get the employee as array
     * @return array
     */
    public function toArray()
    {
        return [
            'id'       => $this->id->get(),
            'name'     => $this->name->get(),
            'surname'  => $this->surname->get(),
            'email'    => $this->email->get(),
            'phone'    => $this->phone->get(),
            'birthday' => $this->birthday->get(),
            'salary'   => $this->salary->get(),
            'status'   => $this->status->name(),
            'company_id' => $this->companyId->get(),
            'status'  => $this->status->name(),
        ];
    }
}
