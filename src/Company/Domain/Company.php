<?php

namespace Vocces\Company\Domain;

use Vocces\Company\Domain\ValueObject\CompanyId;
use Vocces\Company\Domain\ValueObject\CompanyName;
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
     * @var \Vocces\Company\Domain\ValueObject\CompanyStatus
     */
    private CompanyStatus $status;

    public function __construct(
        CompanyId $id,
        CompanyName $name,
        CompanyStatus $status
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
    }

    public function id(): CompanyId
    {
        return $this->id;
    }

    public function name(): CompanyName
    {
        return $this->name;
    }

    public function status(): CompanyStatus
    {
        return $this->status;
    }

    public function toArray()
    {
        return [
            'id'       => $this->id()->get(),
            'name'     => $this->name()->get(),
            'status'   => $this->status()->name(),
        ];
    }
}
