<?php

namespace App\Http\Controllers\Api\Employee;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Vocces\Employee\Application\EmployeeCreator;
use App\Http\Requests\Employee\CreateEmployeeRequest;

class PostCreateEmployeeController extends Controller
{
    /**
     * Create new employee
     *
     * @param \App\Http\Requests\Employee\CreateEmployeeRequest $request
     */
    public function __invoke(CreateEmployeeRequest $request, EmployeeCreator $service)
    {
        // Start transaction
        DB::beginTransaction();

        try {
            // Create employee
            $employee = $service->handle(Str::uuid(), $request->name, $request->surname, $request->email, $request->phone, $request->birthday, $request->salary, $request->company_id);

            // Commit transaction
            DB::commit();

            // Return the employee
            return response($employee, 201);
        } catch (\Throwable $error) {
            // Rollback transaction
            DB::rollback();
            throw $error;
        }
    }
}
