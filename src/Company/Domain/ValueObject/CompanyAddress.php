<?php

namespace Vocces\Company\Domain\ValueObject;

final class CompanyAddress
{
    // Properties
    private string $address;

    /**
     * Create new instance
     * @param string $address
     * @return void
     */
    public function __construct(string $address)
    {
        $this->address = $address;
    }

    /**
     * Get the address
     * @return string
     */
    public function get(): string
    {
        return $this->address;
    }

    /**
     * Get the address as string
     * @return string
     */
    public function __toString()
    {
        return $this->address;
    }
}
