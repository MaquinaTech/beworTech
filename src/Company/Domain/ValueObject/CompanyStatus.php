<?php

namespace Vocces\Company\Domain\ValueObject;

use Vocces\Shared\Infrastructure\Interfaces\Arrayable;
use Vocces\Company\Domain\Exception\InvalidCompanyStatusException;

final class CompanyStatus implements Arrayable
{
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
     */
    public function __construct(int $status)
    {
        $this->status = $this->validate($status);
    }

    /**
     * Validate value
     */
    private function validate(int $value): int
    {
        if (!array_key_exists($value, self::AVAILABLES)) {
            throw new InvalidCompanyStatusException('Invalid status id: ' . $value);
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
     * @return \Vocces\Company\Domain\CompanyStatus
     */
    public static function enabled(): CompanyStatus
    {
        return new self(self::ENABLED);
    }

    /**
     * Create instance disabled status
     * @return \Vocces\Company\Domain\CompanyStatus
     */
    public static function disabled(): CompanyStatus
    {
        return new self(self::DISABLED);
    }

    /**
     * Create new instance from name
     * @return string
     */
    public static function fromName(string $name): CompanyStatus
    {
        $key = array_search($name, self::AVAILABLES);

        if (false === $key) {
            throw new InvalidCompanyStatusException('Invalid status name: ' . $name);
        }

        return new self($key);
    }

    /**
     * Create new instance from id or name
     * @return string
     */
    public static function create($value): CompanyStatus
    {
        if (is_numeric($value)) {
            return new self($value);
        }

        return self::fromName((string) $value);
    }

    public function toArray()
    {
        return [
            'code' => $this->code(),
            'name' => $this->name(),
        ];
    }
}
