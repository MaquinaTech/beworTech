<?php

namespace Vocces\Company\Domain\ValueObject;

final class CompanyName
{
    // Properties
    private string $name;

    /**
     * Create new instance
     * @param string $name
     * @return void
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get the name
     * @return string
     */
    public function get(): string
    {
        return $this->name;
    }

    /**
     * Get the name as string
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
