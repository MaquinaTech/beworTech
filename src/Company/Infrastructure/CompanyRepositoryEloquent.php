<?php

namespace Vocces\Company\Infrastructure;

use App\Models\Company as ModelsCompany;
use Vocces\Company\Domain\Company;
use Vocces\Company\Domain\ValueObject\CompanyId;
use Vocces\Company\Domain\ValueObject\CompanyName;
use Vocces\Company\Domain\ValueObject\CompanyEmail;
use Vocces\Company\Domain\ValueObject\CompanyAddress;
use Vocces\Company\Domain\ValueObject\CompanyStatus;
use Vocces\Company\Domain\CompanyRepositoryInterface;

class CompanyRepositoryEloquent implements CompanyRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(Company $company): void
    {
        // Create a new company in the database
        ModelsCompany::Create([
            'id'     => $company->id(),
            'name'   => $company->name(),
            'email'   => $company->email(),
            'address' => $company->address(),
            'status' => $company->status()->name(),
        ]);
    }

    /**
     * @inheritDoc
     */
    public function activate(string $id): ?Company
    {
        // Find the company in the database
        $model = ModelsCompany::find($id);

        // If the company is not found, throw an exception
        if (!isset($model)) {
            throw new \Exception('Company not found');
        }

        // Set the status to enabled
        $model->status = CompanyStatus::enabled()->code();

        // Save the changes to the database
        $model->save();

        // Create and return the Company domain object
        return new Company(
            new CompanyId($model->id),
            new CompanyName($model->name),
            new CompanyEmail($model->email),
            new CompanyAddress($model->address),
            new CompanyStatus($model->status),
        );
    }

    /**
     * @inheritDoc
     */
    public function list(): ?array
    {
        // Get the company list from the database
        $list = ModelsCompany::all();

        // If the list is empty, throw an exception
        if (empty($list)) {
            throw new \Exception('No companies found');
        }

        // Create an array to store the companies
        $companies = [];

        // Iterate the list
        foreach ($list as $model) {
            // Create a new Company domain object
            $company = new Company(
                new CompanyId($model->id),
                new CompanyName($model->name),
                new CompanyEmail($model->email),
                new CompanyAddress($model->address),
                new CompanyStatus($model->status == 'active' ? 1 : 2),
            );

            // Add the company to the array
            $companies[] = $company;
        }

        // Return the company list
        return $companies;
    }
}
