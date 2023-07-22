<?php

namespace Test\Vocces\Employee\Application;

use Tests\TestCase;
use Illuminate\Support\Str;

// -------- Company -------- //
use Vocces\Company\Application\CompanyCreator;
use Tests\Vocces\Company\Infrastructure\CompanyRepositoryFake;

// -------- Employee -------- //
use Vocces\Employee\Domain\Employee;
use Vocces\Employee\Application\EmployeeCreator;
use Tests\Vocces\Employee\Infrastructure\EmployeeRepositoryFake;



final class CreateANewEmployeeTest extends TestCase
{
    /**
     * @group application
     * @group employee
     * @test
     */
    public function createANewEmployee()
    {
        /**
         * Preparing
         */
        $faker = \Faker\Factory::create();

        // -------- Employee -------- //
        
        $testEmployee = [
            'id'     =>  Str::uuid(),
            'name'   => $faker->name,
            'surname'   => $faker->lastName,
            'email'   => $faker->email,
            'phone'   => $faker->phoneNumber,
            'birthday'   => $faker->date('Y-m-d'),
            'salary'   =>  $faker->randomFloat(2, 1000, 10000),
            'status'   => 'inactive',
            'company_id'   => Str::uuid(),
        ];

        /**
         * Actions
         */
        $creator = new EmployeeCreator(new EmployeeRepositoryFake());
        $employee = $creator->handle(
            $testEmployee['id'],
            $testEmployee['name'],
            $testEmployee['surname'],
            $testEmployee['email'],
            $testEmployee['phone'],
            $testEmployee['birthday'],
            $testEmployee['salary'],
            $testEmployee['company_id']
        );

        /**
         * Assert
         */
        $this->assertInstanceOf(Employee::class, $employee);
        $this->assertEquals($testEmployee, $employee->toArray());
    }
}
