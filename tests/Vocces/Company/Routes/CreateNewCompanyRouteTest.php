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
            'name'   => $faker->name,
            'status' => 'inactive',
        ];

        /**
         * Actions
         */
        $response = $this->json('POST', '/api/company', [
            'name' => $testCompany['name'],
        ]);

        /**
         * Asserts
         */
        $response->assertStatus(201)
            ->assertJsonFragment($testCompany);
    }
}
