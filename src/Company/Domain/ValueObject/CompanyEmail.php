<?php

namespace Vocces\Company\Domain\ValueObject;

use Vocces\Company\Domain\Exception\InvalidCompanyEmailException;

final class CompanyEmail
{

    private string $email;

    public function __construct(string $email)
    {
        $this->validate($email);
        $this->email = $email;
    }

    private function validate(string $email): void
    {
        // validación del correo electrónico
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidCompanyEmailException($email);
            }
    }

    public function get(): string
    {
        return $this->email;
    }

    public function __toString()
    {
        return $this->email;
    }
}
