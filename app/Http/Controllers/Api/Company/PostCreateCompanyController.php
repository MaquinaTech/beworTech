<?php

namespace App\Http\Controllers\Api\Company;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Vocces\Company\Application\CompanyCreator;
use App\Http\Requests\Company\CreateCompanyRequest;

class PostCreateCompanyController extends Controller
{
    /**
     * Create new company
     *
     * @param \App\Http\Requests\Company\CreateCompanyRequest $request
     */
    public function __invoke(CreateCompanyRequest $request, CompanyCreator $service)
    {
        // Start transaction
        DB::beginTransaction();

        try {
            // Create company
            $company = $service->handle(Str::uuid(), $request->name, $request->email, $request->address);

            // Commit transaction
            DB::commit();

            // Return the company
            return response($company, 201);

        } catch (\Throwable $error) {
            // Rollback transaction
            DB::rollback();
            throw $error;
        }
    }
}
