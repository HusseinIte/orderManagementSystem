<?php


namespace App\Services\Users;


use App\Models\User\Employee;
use App\Models\User\EmployeeType;
use Illuminate\Http\Request;


class EmployeeService
{
    protected $user;

    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('admin.employee.index');
    }

    public function createEmployee()
    {
        return view('admin.employee.create');
    }

    public function storeEmployee(Request $request)
    {
        $user = $this->user->storeUser($request);
        $employee = Employee::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'note' => $request->note,
        ]);
        return response()->json([
            'employee' => $employee,
            'user' => $user,
        ]);

    }
}
