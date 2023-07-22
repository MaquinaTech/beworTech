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
        DB::beginTransaction();
        try {
            $employee = $service->handle(Str::uuid(), $request->name, $request->surname, $request->email, $request->phone, $request->birthday, $request->salary, $request->company_id);
            DB::commit();
            return response($employee, 201);
        } catch (\Throwable $error) {
            DB::rollback();
            throw $error;
        }
    }
}
