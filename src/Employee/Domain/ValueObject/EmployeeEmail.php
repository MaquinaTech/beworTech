<?php

namespace Vocces\Employee\Domain\ValueObject;

use Vocces\Employee\Domain\Exception\InvalidEmployeeEmailException;

final class EmployeeEmail
{
    // Properties
    private string $email;

    /**
     * Create new instance
     * @param string $email
     * @return void
     */
    public function __construct(string $email)
    {
        $this->validate($email);
        $this->email = $email;
    }

    /**
     * Validate the email
     * @param string $email
     * @return void
     * @throws InvalidEmployeeEmailException
     */
    private function validate(string $email): void
    {
        // validación del correo electrónico
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidEmployeeEmailException($email);
            }
    }

    /**
     * Get the email
     * @return string
     */
    public function get(): string
    {
        return $this->email;
    }

    /**
     * Get the email as string
     * @return string
     */
    public function __toString()
    {
        return $this->email;
    }
}
