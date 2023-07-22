<?php

namespace App\Http\Controllers\Api\Employee;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Vocces\Employee\Application\EmployeeStatusActivate;
use App\Http\Requests\Employee\ActivateEmployeeRequest;


class PostActivateEmployeeController extends Controller
{
    /**
     * Activate a employee
     *
     * @param \App\Http\Requests\Employee\ActivateEmployeeRequest $request
     * @param \Vocces\Employee\Application\EmployeeStatusActivate $service
     * 
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ActivateEmployeeRequest $request, EmployeeStatusActivate $service)
    {
        // Start transaction
        DB::beginTransaction();
        try {
            // Activate the employee
            $employee = $service->handle($request->id);

            // Commit the transaction
            DB::commit();

            // Return the employee
            return response($employee, 201);

        } catch (\Exception $e) {
            // Rollback the transaction
            DB::rollBack();

            // Return the error
            return response()->json([
                'message' => 'Error activate employee',
                'error' => $e->getMessage(),
            ], 500);
        }
        
    }
}
