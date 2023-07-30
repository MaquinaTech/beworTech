<?php

namespace App\Http\Controllers\Api\Employee;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Vocces\Employee\Application\EmployeeList;
use App\Http\Requests\Employee\ListEmployeeRequest;


class GetListEmployeeController extends Controller
{
    /**
     * Activate a employee
     *
     * @param \App\Http\Requests\Employee\ListEmployeeRequest $request
     * @param \Vocces\Employee\Application\EmployeeList $service
     * 
     * @return \Illuminate\Http\Response
     */
    public function __invoke(EmployeeList $service)
    {
        try {
            // Get the list of employees
            $employees = $service->handle();

            // Return the list of employees
            return response()->json($employees, 200);

        } catch (\Exception $e) {
            // Return the error
            return response()->json([
                'message' => 'Error fetching employee list',
                'error' => $e->getMessage(),
            ], 500);
        }
        
    }
}
