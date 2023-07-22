<?php

namespace Vocces\Employee\Domain\ValueObject;

final class EmployeeBirthday
{
    // Properties
    private string $birthday;

    /**
     * Create new instance
     * @param string $birthday
     * @return void
     */
    public function __construct(string $birthday)
    {
        // Validate the value
        $this->birthday = $this->validate($birthday);
    }

    /**
     * Validate value
     * @param string $value
     * @return string
     * @throws InvalidEmployeeBirthdayException
     */
    private function validate(string $value): string
    {   
        // If the value is empty, throw an exception
        if (empty($value)) {
            throw new InvalidEmployeeBirthdayException('Invalid birthday: ' . $value);
        }
    
        // Try to create a DateTime object with the specific format (YYYY-MM-DD)
        $parsedDate = \DateTime::createFromFormat('Y-m-d', $value);
    
        // If the date is not valid, throw an exception
        if (!$parsedDate || $parsedDate->format('Y-m-d') !== $value) {
            throw new InvalidEmployeeBirthdayException('Invalid date format: ' . $value);
        }

        return $value;
    }

    /**
     * Get the birthday
     * @return string
     */
    public function get(): string
    {
        return $this->birthday;
    }

    /**
     * Get the birthday as string
     * @return string
     */
    public function __toString()
    {
        return $this->birthday;
    }
}
