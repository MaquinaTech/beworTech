<?php

namespace Tests\Vocces\Employee\Domain;

use Tests\TestCase;
use Vocces\Employee\Domain\ValueObject\EmployeeEmail;
use Vocces\Employee\Domain\Exception\InvalidEmployeeEmailException;

final class EmployeeEmailTest extends TestCase
{
    /**
     * @group domain
     * @group company
     * @test
     */
    public function validEmployeeEmail()
    {
        /**
         * Actions
         */
        $emailString = 'test@example.com';
        $email = new EmployeeEmail($emailString);

        /**
         * Assert
         */
        $this->assertEquals($emailString, $email->__toString());
    }

    /**
     * @group domain
     * @group company
     * @test
     */
    public function invalidEmployeeEmail()
    {
        /**
         * Actions
         */
        $this->expectException(InvalidEmployeeEmailException::class);
        new EmployeeEmail('invalid_email');
    }

    /**
     * @group domain
     * @group company
     * @test
     */
    public function companyEmailToString()
    {
        /**
         * Actions
         */
        $emailString = 'test@example.com';
        $email = new EmployeeEmail($emailString);

        /**
         * Assert
         */
        $this->assertEquals($emailString, (string)$email);
    }
}
