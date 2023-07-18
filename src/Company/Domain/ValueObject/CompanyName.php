<?php

namespace Vocces\Company\Domain\ValueObject;

final class CompanyName
{

    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function get(): string
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }
}
