<?php

namespace Test\Vocces\Company\Domain;

use Tests\TestCase;
use Vocces\Company\Domain\ValueObject\CompanyStatus;
use Vocces\Company\Domain\Exception\InvalidCompanyStatusException;

final class CompanyStatusTest extends TestCase
{
    /**
     * @group domain
     * @group company
     * @test
     */
    public function invalidCompanyStatusFromCode()
    {
        /**
         * Actions
         */
        $this->expectException(InvalidCompanyStatusException::class);
        new CompanyStatus(123485);
    }

    /**
     * @group domain
     * @group company
     * @test
     */
    public function invalidCompanyStatusFromName()
    {
        /**
         * Actions
         */
        $this->expectException(InvalidCompanyStatusException::class);
        CompanyStatus::create('❤️🤫');
    }

    /**
     * @group domain
     * @group company
     * @test
     */
    public function createActiveCompanyStatus()
    {
        /**
         * Actions
         */
        $status = CompanyStatus::create('active');

        /**
         * Assert
         */
        $this->assertEquals('active', $status->name());
        $this->assertEquals(1, $status->code());
    }

    /**
     * @group domain
     * @group company
     * @test
     */
    public function createActiveFromCodeCompanyStatus()
    {
        /**
         * Actions
         */
        $status = CompanyStatus::create(1);

        /**
         * Assert
         */
        $this->assertEquals('active', $status->name());
        $this->assertEquals(1, $status->code());
        $this->assertEquals(['code' => 1, 'name' => 'active'], $status->toArray());
    }

    /**
     * @group domain
     * @group company
     * @test
     */
    public function createEnabledCompanyStatus()
    {
        /**
         * Actions
         */
        $status = CompanyStatus::enabled();

        /**
         * Assert
         */
        $this->assertEquals('active', $status->name());
        $this->assertEquals(1, $status->code());
    }
}
