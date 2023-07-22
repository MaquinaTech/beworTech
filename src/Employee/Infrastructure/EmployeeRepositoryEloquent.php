<?php

namespace Vocces\Employee\Infrastructure;

use App\Models\Employee as ModelsEmployee;
use Vocces\Employee\Domain\Employee;
use Vocces\Employee\Domain\ValueObject\EmployeeId;
use Vocces\Employee\Domain\ValueObject\EmployeeName;
use Vocces\Employee\Domain\ValueObject\EmployeeSurname;
use Vocces\Employee\Domain\ValueObject\EmployeeEmail;
use Vocces\Employee\Domain\ValueObject\EmployeePhone;
use Vocces\Employee\Domain\ValueObject\EmployeeBirthday;
use Vocces\Employee\Domain\ValueObject\EmployeeSalary;
use Vocces\Employee\Domain\ValueObject\EmployeeStatus;
use Vocces\Company\Domain\ValueObject\CompanyId;
use Vocces\Employee\Domain\EmployeeRepositoryInterface;

class EmployeeRepositoryEloquent implements EmployeeRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(Employee $employee): void
    {
        // Create a new employee in the database
        ModelsEmployee::Create([
            'id'     => $employee->id(),
            'name'   => $employee->name(),
            'surname'   => $employee->surname(),
            'email'   => $employee->email(),
            'phone'   => $employee->phone(),
            'birthday'   => $employee->birthday(),
            'salary'   => $employee->salary(),
            'status' => $employee->status()->name(),
            'company_id'   => $employee->companyId(),
        ]);
    }

    /**
     * @inheritDoc
     */
    public function activate(string $id): ?Employee
    {
        // Find the employee in the database
        $model = ModelsEmployee::find($id);

        if (!isset($model)) {
            return null;
        }

        // Set the status to enabled
        $model->status = EmployeeStatus::enabled()->code();

        // Save the changes to the database
        $model->save();

        // Create and return the Employee domain object
        return new Employee(
            new EmployeeId($model->id),
            new EmployeeName($model->name),
            new EmployeeSurname($model->surname),
            new EmployeeEmail($model->email),
            new EmployeePhone($model->phone),
            new EmployeeBirthday($model->birthday),
            new EmployeeSalary($model->salary),
            new EmployeeStatus($model->status),
            new CompanyId($model->company_id),
        );
    }

    /**
     * @inheritDoc
     */
    public function list(): ?array
    {
        // Get the employee list from the database
        $list = ModelsEmployee::all();

        // If the list is empty, return null
        if (empty($list)) {
            return null;
        }

        // Create an array to store the employees
        $employees = [];

        // Iterate the list
        foreach ($list as $model) {
            // Create a new Employee domain object
            $employee = new Employee(
                new EmployeeId($model->id),
                new EmployeeName($model->name),
                new EmployeeSurname($model->surname),
                new EmployeeEmail($model->email),
                new EmployeePhone($model->phone),
                new EmployeeBirthday($model->birthday),
                new EmployeeSalary($model->salary),
                new EmployeeStatus($model->status == 'active' ? 1 : 2),
                new CompanyId($model->company_id),
            );

            // Add the employee to the array
            $employees[] = $employee;
        }

        // Return the employee list
        return $employees;
    }
}
