<?php

namespace Tests\Vocces\Company\Infrastructure;

use Vocces\Company\Domain\Company;
use Vocces\Company\Domain\CompanyRepositoryInterface;

class CompanyRepositoryFake implements CompanyRepositoryInterface
{
    public bool $callMethodCreate = false;

    /**
     * @inheritdoc
     */
    public function create(Company $company): void
    {
        $this->callMethodCreate = true;
    }
}
