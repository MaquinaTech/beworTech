<?php

namespace Test\Vocces\Company\Application;

use Tests\TestCase;
use Illuminate\Support\Str;
use Vocces\Company\Domain\Company;
use Vocces\Company\Application\CompanyCreator;
use Tests\Vocces\Company\Infrastructure\CompanyRepositoryFake;

final class CreateANewCompanyTest extends TestCase
{
    /**
     * @group application
     * @group company
     * @test
     */
    public function createANewCompany()
    {
        /**
         * Preparing
         */
        $faker = \Faker\Factory::create();
        $testCompany = [
            'id'     => Str::uuid(),
            'name'   => $faker->name,
            'email'   => $faker->email,
            'address' => $faker->address,
            'status' => 'inactive',
        ];

        /**
         * Actions
         */
        $creator = new CompanyCreator(new CompanyRepositoryFake());
        $company = $creator->handle(
            $testCompany['id'],
            $testCompany['name'],
            $testCompany['email'],
            $testCompany['address'],
        );

        /**
         * Assert
         */
        $this->assertInstanceOf(Company::class, $company);
        $this->assertEquals($testCompany, $company->toArray());
    }
}
