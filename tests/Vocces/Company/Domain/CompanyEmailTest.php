<?php

namespace Tests\Vocces\Company\Domain;

use Tests\TestCase;
use Vocces\Company\Domain\ValueObject\CompanyEmail;
use Vocces\Company\Domain\Exception\InvalidCompanyEmailException;

final class CompanyEmailTest extends TestCase
{
    /**
     * @group domain
     * @group company
     * @test
     */
    public function validCompanyEmail()
    {
        /**
         * Actions
         */
        $emailString = 'test@example.com';
        $email = new CompanyEmail($emailString);

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
    public function invalidCompanyEmail()
    {
        /**
         * Actions
         */
        $this->expectException(InvalidCompanyEmailException::class);
        new CompanyEmail('invalid_email');
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
        $email = new CompanyEmail($emailString);

        /**
         * Assert
         */
        $this->assertEquals($emailString, (string)$email);
    }
}
