<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Users\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index()
    {
        return $this->employeeService->index();
    }

    public function createEmployee()
    {
        return $this->employeeService->createEmployee();
    }

    public function editEmployee()
    {
        return $this->employeeService->editEmployee();
    }

    public function storeEmployee(Request $request)
    {
        $this->employeeService->storeEmployee($request);

    }
}
