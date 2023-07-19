<?php

namespace App\Http\Controllers\Api\Company;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Vocces\Company\Application\CompanyUpdater;
use Vocces\Company\Application\CompanyStatusActivate;
use App\Http\Requests\Company\ActivateCompanyRequest;


class PostActivateCompanyController extends Controller
{
    /**
     * Activate a company
     *
     * @param \App\Http\Requests\Company\ActivateCompanyRequest $request
     * @param \Vocces\Company\Application\CompanyStatusActivate $service
     * 
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ActivateCompanyRequest $request, CompanyStatusActivate $service)
    {
        // Start transaction
        DB::beginTransaction();
        try {
            // Activate the company
            $company = $service->handle($request->id);

            // Commit the transaction
            DB::commit();

            // Return the company
            return response($company, 201);

        } catch (\Exception $e) {
            // Rollback the transaction
            DB::rollBack();

            // Return the error
            return response()->json([
                'message' => 'Error activate company',
                'error' => $e->getMessage(),
            ], 500);
        }
        
    }
}
