<?php

namespace Tests\Vocces\Company\Routes;

use Tests\TestCase;
use Illuminate\Support\Str;
use Vocces\Company\Domain\ValueObject\CompanyStatus;

class ActivateCompanyRouteTest extends TestCase
{
    /**
     * @group route
     * @group access-interface
     * @test
     */
    public function it_can_activate_a_company()
    {
        // Arrange: Prepare the test data
        $faker = \Faker\Factory::create();
        $testCompany = [
            'id'      => Str::uuid(),
            'name'    => $faker->name,
            'email'   => $faker->email,
            'address' => $faker->address,
            'status'  => CompanyStatus::disabled()->name(),
        ];

        // Act: Create a new company and activate it
        $response = $this->json('POST', '/api/company', $testCompany);

        // Update the id of the testCompany with the id that the response returns
        $testCompany['id'] = $response->json('id');

        // Activate the company
        $response2 = $this->json('POST', '/api/company/activate', ['id' => $response->json('id')]);

        // Get the response content as an array and remove the 'status' field
        $response2Data = $response2->json();
        unset($response2Data['status']);

        // Assert: Check the responses and verify the activation
        $response->assertStatus(201)
            ->assertJson($testCompany); // Check that the created company data matches

        $response2->assertStatus(201)
            ->assertJsonFragment(['status' => 'active']); // Check that the company was activated
    }
}
