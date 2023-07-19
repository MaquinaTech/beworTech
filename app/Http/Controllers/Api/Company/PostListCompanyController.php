<?php

namespace App\Http\Controllers\Api\Company;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Vocces\Company\Application\CompanyList;
use App\Http\Requests\Company\ListCompanyRequest;


class PostListCompanyController extends Controller
{
    /**
     * Activate a company
     *
     * @param \App\Http\Requests\Company\ListCompanyRequest $request
     * @param \Vocces\Company\Application\CompanyList $service
     * 
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CompanyList $service)
    {
        try {
            // Get the list of companies
            $companies = $service->handle();

            // Return the list of companies
            return response()->json($companies, 200);

        } catch (\Exception $e) {
            // Return the error
            return response()->json([
                'message' => 'Error fetching company list',
                'error' => $e->getMessage(),
            ], 500);
        }
        
    }
}
