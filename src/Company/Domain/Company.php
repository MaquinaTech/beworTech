<?php

namespace Vocces\Company\Domain;

use Vocces\Company\Domain\ValueObject\CompanyId;
use Vocces\Company\Domain\ValueObject\CompanyName;
use Vocces\Company\Domain\ValueObject\CompanyEmail;
use Vocces\Company\Domain\ValueObject\CompanyAddress;
use Vocces\Company\Domain\ValueObject\CompanyStatus;
use Vocces\Shared\Infrastructure\Interfaces\Arrayable;

final class Company implements Arrayable
{
    /**
     * @var \Vocces\Company\Domain\ValueObject\CompanyId
     */
    private CompanyId $id;

    /**
     * @var \Vocces\Company\Domain\ValueObject\CompanyName
     */
    private CompanyName $name;

    /**
     * @var \Vocces\Company\Domain\ValueObject\CompanyEmail
     */
    private CompanyEmail $email;

    /**
     * @var \Vocces\Company\Domain\ValueObject\CompanyAddress
     */
    private CompanyAddress $address;

    /**
     * @var \Vocces\Company\Domain\ValueObject\CompanyStatus
     */
    private CompanyStatus $status;

    /**
     * Create new instance
     * @param CompanyId $id
     * @param CompanyName $name
     * @param CompanyEmail $email
     * @param CompanyAddress $address
     * @param CompanyStatus $status
     * @return void
     */
    public function __construct(
        CompanyId $id,
        CompanyName $name,
        CompanyEmail $email,
        CompanyAddress $address,
        CompanyStatus $status
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->status = $status;
    }

    /**
     * Get the company id
     * @return CompanyId
     */
    public function id(): CompanyId
    {
        return $this->id;
    }

    /**
     * Get the company name
     * @return CompanyName
     */
    public function name(): CompanyName
    {
        return $this->name;
    }

    /**
     * Get the company email
     * @return CompanyEmail
     */
    public function email(): CompanyEmail
    {
        return $this->email;
    }

    /**
     * Get the company address
     * @return CompanyAddress
     */
    public function address(): CompanyAddress
    {
        return $this->address;
    }

    /**
     * Get the company status
     * @return CompanyStatus
     */
    public function status(): CompanyStatus
    {
        return $this->status;
    }

    /**
     * Set the company status
     * @param CompanyStatus $status
     * @return void
     */
    public function setStatus(CompanyStatus $status): void
    {
        $this->status = $status;
    }

    /**
     * Get the company as array
     * @return array
     */
    public function toArray()
    {
        return [
            'id'       => $this->id()->get(),
            'name'     => $this->name()->get(),
            'email'    => $this->email()->get(),
            'address'  => $this->address()->get(),
            'status'   => $this->status()->name(),
        ];
    }
}
