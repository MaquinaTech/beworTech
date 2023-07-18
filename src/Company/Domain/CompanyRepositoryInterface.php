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
     * Update a company instance
     *
     * @param Company $company
     *
     * @return void
     */
    public function activate(Company $company): void;
}
