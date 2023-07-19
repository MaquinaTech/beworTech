<?php

namespace Tests\Vocces\Company\Routes;

use Tests\TestCase;
use Illuminate\Support\Str;
use Vocces\Company\Domain\Company;
use Vocces\Company\Domain\ValueObject\CompanyId;
use Vocces\Company\Domain\ValueObject\CompanyName;
use Vocces\Company\Domain\ValueObject\CompanyEmail;
use Vocces\Company\Domain\ValueObject\CompanyAddress;
use Vocces\Company\Domain\ValueObject\CompanyStatus;

class ListCompanyRouteTest extends TestCase
{
    /**
     * @group route
     * @group access-interface
     * @test
     */
    public function postListCompanyRoute()
    {
        // Arrange: Prepare the test data
        $faker = \Faker\Factory::create();
        $companies = [];
        for ($i = 0; $i < 3; $i++) {
            $company = [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail(),
                'address' => $faker->address,
            ];
            // Create a new company
            $response = $this->json('POST', '/api/company', $company);
        }

        // Act: List the companies
        $list = $this->json('GET', '/api/company');

        // Assert: Check the response status code
        $list->assertStatus(200);

        // Assert: Check that the companies list is an array
        $companyList = $list->json();
        $this->assertIsArray($companyList);

        // Assert: Check that the companies list has more than 3 elements
        $this->assertGreaterThan(2, count($companyList));
        
    }
}
