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
        $fakeRepository = new CompanyRepositoryFake();

        $creator = new CompanyCreator($fakeRepository);
        for($i = 0; $i < 3; $i++){
            $creator->handle(
                Str::uuid(),
                $faker->name,
                $faker->unique()->safeEmail(),
                $faker->address,
            );
            
        }

        /**
         * Actions
         */
        $list = new CompanyList($fakeRepository);
        $companies = $list->handle();

        // Create an empty list
        $empty_list = new CompanyList(new CompanyRepositoryFake());


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

        // Expect an exception when the company is not found
        $this->expectException(\Exception::class);
        $companies_exception = $empty_list->handle();
        
    }
}
