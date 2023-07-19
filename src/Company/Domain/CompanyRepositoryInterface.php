<?php

namespace Vocces\Company\Domain;

interface CompanyRepositoryInterface
{
    /**
     * Persist a new company instance
     *
     * @param Company $company
     *
     * @return void
     */
    public function create(Company $company): void;

    /**
     * Activate a company
     *
     * @param string $id
     *
     * @return Company|null
     */
    public function activate(string $id): ?Company;
}
