<?php

namespace Vocces\Employee\Domain\ValueObject;

use Vocces\Shared\Infrastructure\Interfaces\Arrayable;
use Vocces\Employee\Domain\Exception\InvalidEmployeeStatusException;

final class EmployeeStatus implements Arrayable
{
    // Properties
    public const ENABLED = 1;
    public const DISABLED = 2;

    public const AVAILABLES = [
        self::ENABLED  => 'active',
        self::DISABLED => 'inactive'
    ];

    /**
     * Status
     * @var int
     */
    private int $status;

    /**
     * Create new instance
     * @param int $status
     * @return void
     */
    public function __construct(int $status)
    {
        $this->status = $this->validate($status);
    }

    /**
     * Validate value
     * @param int $value
     * @return int
     * @throws InvalidEmployeeStatusException
     */
    private function validate(int $value): int
    {
        if (!array_key_exists($value, self::AVAILABLES)) {
            throw new InvalidEmployeeStatusException('Invalid status id: ' . $value);
        }
        return $value;
    }

    /**
     * Return code status
     * @return int
     */
    public function code(): int
    {
        return $this->status;
    }

    /**
     * Return name status
     * @return string
     */
    public function name(): string
    {
        return self::AVAILABLES[$this->status];
    }

    /**
     * Create instance enabled status
     * @return \Vocces\Employee\Domain\EmployeeStatus
     */
    public static function enabled(): EmployeeStatus
    {
        return new self(self::ENABLED);
    }

    /**
     * Create instance disabled status
     * @return \Vocces\Employee\Domain\EmployeeStatus
     */
    public static function disabled(): EmployeeStatus
    {
        return new self(self::DISABLED);
    }

    /**
     * Create new instance from name
     * @param string $name
     * @return string
     * @throws InvalidEmployeeStatusException
     */
    public static function fromName(string $name): EmployeeStatus
    {
        $key = array_search($name, self::AVAILABLES);

        if (false === $key) {
            throw new InvalidEmployeeStatusException('Invalid status name: ' . $name);
        }

        return new self($key);
    }

    /**
     * Create new instance from id or name
     * @param int|string $value
     * @return string
     */
    public static function create($value): EmployeeStatus
    {
        if (is_numeric($value)) {
            return new self($value);
        }

        return self::fromName((string) $value);
    }

    /**
     * Return array
     * @return array
     */
    public function toArray()
    {
        return [
            'code' => $this->code(),
            'name' => $this->name(),
        ];
    }
}
