<?php

namespace Tests\Vocces\Company\Routes;

use Tests\TestCase;

class CreateNewCompanyRouteTest extends TestCase
{
    /**
     * @group route
     * @group access-interface
     * @test
     */
    public function postCreateNewCompanyRoute()
    {
        /**
         * Preparing
         */
        $faker = \Faker\Factory::create();
        $testCompany = [
            'name'    => $faker->name,
            'email'   => $faker->email,
            'address' => $faker->address,
            'status'  => 'inactive',
        ];

        /**
         * Actions
         */
        $response = $this->json('POST', '/api/company', $testCompany);

        /**
         * Asserts
         */
        $response->assertStatus(201)
            ->assertJsonFragment($testCompany);
    }
}
