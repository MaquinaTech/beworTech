<?php
namespace Test\Vocces\Company\Application;

use Tests\TestCase;
use Illuminate\Support\Str;
use Vocces\Company\Domain\Company;
use Vocces\Company\Domain\ValueObject\CompanyStatus;
use Vocces\Company\Application\CompanyCreator;
use Vocces\Company\Application\CompanyStatusActivate;
use Tests\Vocces\Company\Infrastructure\CompanyRepositoryFake;

final class ActivateCompanyStatusTest extends TestCase
{
    /**
     * @group application
     * @group company
     * @test
     */
    public function activateCompanyStatus()
    {
        /**
         * Preparing
         */
        $faker = \Faker\Factory::create();
        $testCompany = [
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
        $company = $creator->handle(
            $testCompany['id'],
            $testCompany['name'],
            $testCompany['email'],
            $testCompany['address'],
        );

        // Actualizar el estado de la compañía creada
        $activate = new CompanyStatusActivate($fakeRepository);
        $activatedCompany = $activate->handle($company->id());

        /**
         * Assert
         */
        $this->assertInstanceOf(Company::class, $activatedCompany);
        $this->assertEquals(CompanyStatus::enabled(), $activatedCompany->status());
    }
}
