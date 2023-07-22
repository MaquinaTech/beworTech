<?php

namespace Test\Vocces\Employee\Domain;

use Tests\TestCase;
use Vocces\Employee\Domain\ValueObject\EmployeeStatus;
use Vocces\Employee\Domain\Exception\InvalidEmployeeStatusException;

final class EmployeeStatusTest extends TestCase
{
    /**
     * @group domain
     * @group company
     * @test
     */
    public function invalidEmployeeStatusFromCode()
    {
        /**
         * Actions
         */
        $this->expectException(InvalidEmployeeStatusException::class);
        new EmployeeStatus(123485);
    }

    /**
     * @group domain
     * @group company
     * @test
     */
    public function invalidEmployeeStatusFromName()
    {
        /**
         * Actions
         */
        $this->expectException(InvalidEmployeeStatusException::class);
        EmployeeStatus::create('❤️🤫');
    }

    /**
     * @group domain
     * @group company
     * @test
     */
    public function createActiveEmployeeStatus()
    {
        /**
         * Actions
         */
        $status = EmployeeStatus::create('active');

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
    public function createActiveFromCodeEmployeeStatus()
    {
        /**
         * Actions
         */
        $status = EmployeeStatus::create(1);

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
    public function createEnabledEmployeeStatus()
    {
        /**
         * Actions
         */
        $status = EmployeeStatus::enabled();

        /**
         * Assert
         */
        $this->assertEquals('active', $status->name());
        $this->assertEquals(1, $status->code());
    }
}
