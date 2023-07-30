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
     * @throws \Exception
     */
    public function activate(string $id): ?Company;

    /**
     * Get company list
     *
     * @return array|null
     * @throws \Exception
     */
    public function list(): ?array;

}
