<?php

namespace Tests\Vocces\Employee\Routes;

use Tests\TestCase;
use Illuminate\Support\Str;

class CreateNewEmployeeRouteTest extends TestCase
{
    /**
     * @group route
     * @group access-interface
     * @test
     */
    public function postCreateNewEmployeeRoute()
    {
        /**
         * Preparing
         */
        $faker = \Faker\Factory::create();

        // -------- Company -------- //
        $testCompany = [
            'name'    => $faker->name,
            'email'   => $faker->email,
            'address' => $faker->address,
            'status'  => 'inactive',
        ];

        $companyRequest = $this->json('POST', '/api/company', $testCompany);
        $company = json_decode($companyRequest->getContent());

        // -------- Employee -------- //
        $testEmployee = [
            'name'       => $faker->name,
            'surname'    => $faker->lastName,
            'email'      => $faker->email,
            'phone'      => $faker->phoneNumber,
            'birthday'   => $faker->date('Y-m-d'),
            'salary'     => $faker->randomFloat(2, 1000, 10000),
            'company_id' => $company->id,                           // The company must be exist in the database 
            'status'     => 'inactive',
        ];

        /**
         * Actions
         */
        $response = $this->json('POST', '/api/employee', $testEmployee);
        
        /**
         * Asserts
         */
        $response->assertStatus(201)
            ->assertJsonFragment($testEmployee);
    }
}
