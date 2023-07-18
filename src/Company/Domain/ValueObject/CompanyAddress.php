<?php

namespace Vocces\Company\Domain\ValueObject;

final class CompanyAddress
{

    private string $address;

    public function __construct(string $address)
    {
        $this->address = $address;
    }

    public function get(): string
    {
        return $this->address;
    }

    public function __toString()
    {
        return $this->address;
    }
}
