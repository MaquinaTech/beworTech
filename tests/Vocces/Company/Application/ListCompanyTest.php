<?php
namespace Test\Vocces\Company\Application;

use Tests\TestCase;
use Illuminate\Support\Str;
use Vocces\Company\Domain\Company;
use Vocces\Company\Domain\ValueObject\CompanyStatus;
use Vocces\Company\Application\CompanyCreator;
use Vocces\Company\Application\CompanyList;
use Tests\Vocces\Company\Infrastructure\CompanyRepositoryFake;

final class ListCompanyTest extends TestCase
{
    /**
     * @group application
     * @group company
     * @test
     */
    public function listCompanies()
    {
        /**
         * Preparing
         */
        $faker = \Faker\Factory::create();
        $testCompany1 = [
            'id'     => Str::uuid(),
            'name'   => $faker->name,
            'email'   => $faker->unique()->safeEmail(),
            'address' => $faker->address,
            'status' => CompanyStatus::disabled(),
        ];
        $testCompany2 = [
            'id'     => Str::uuid(),
            'name'   => $faker->name,
            'email'   => $faker->unique()->safeEmail(),
            'address' => $faker->address,
            'status' => CompanyStatus::disabled(),
        ];
        $testCompany3 = [
            'id'     => Str::uuid(),
            'name'   => $faker->name,
            'email'   => $faker->unique()->safeEmail(),
            'address' => $faker->address,
            'status' => CompanyStatus::disabled(),
        ];

        $fakeRepository = new CompanyRepositoryFake();

        /**
         * Actions
         */
        $creator = new CompanyCreator($fakeRepository);
        $company1 = $creator->handle(
            $testCompany1['id'],
            $testCompany1['name'],
            $testCompany1['email'],
            $testCompany1['address'],
        );
        $company2 = $creator->handle(
            $testCompany2['id'],
            $testCompany2['name'],
            $testCompany2['email'],
            $testCompany2['address'],
        );
        $company3 = $creator->handle(
            $testCompany3['id'],
            $testCompany3['name'],
            $testCompany3['email'],
            $testCompany3['address'],
        );

        // Listamos las compañías
        $list = new CompanyList($fakeRepository);
        $companies = $list->handle();


        /**
         * Assert
         */
        // Check that the companies have been created
        $this->assertIsArray($companies);
        
        // Check that the companies have been created
        $this->assertCount(3, $companies);

        // Check that the companies are of the Company class
        foreach($companies as $company) {
            $this->assertInstanceOf(Company::class, $company);
        }
        
    }
}
