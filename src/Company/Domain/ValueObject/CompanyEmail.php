<?php

namespace Vocces\Company\Domain\ValueObject;

final class CompanyEmail
{

    private string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
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
