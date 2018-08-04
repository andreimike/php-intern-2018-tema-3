<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;


class EmployeesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'createEmployee',
            'updateEmployee',
            'deleteEmployee'
        ]
        ]);
    }

    public function showAllEmployees()
    {
        //$employees = Employee::all();
        $employees = Employee::with(['company' => function ($query) {
            $query->select('id', 'name');
        }])->get();

        return response()->json($employees);
    }

    public function getEmployeeById($id)
    {
        //$employee = Employee::find($id);
        //if (Employee::where('id', '=', Input::get('id'))->exists()) {
        if (Employee::find($id) === null) {
            $employee = "Not entry yet! Please check another user-id";
        } else {
            $employee = Employee::find($id)->with(['company' => function ($query) {
                $query->select('id', 'name');
            }])->get();
        }
        return response()->json($employee);
    }

    public function getEmployeeByJob($job)
    {
        $employees = Employee::where('job', $job)->with(['company' => function ($query) {
            $query->select('id', 'name');
        }])->get();

        return response()->json($employees);
    }

    public function createEmployee(Request $request)
    {
        $data = [
            'name' => $request->name,
            'company_id' => $request->company_id,
            'job' => $request->job
        ];

        $employee = Employee::create($data);

        return response()->json($employee);
    }

    public function updateEmployee(Request $request, $id)
    {


        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->company_id = $request->input('company_id');
        $employee->job = $request->input('job');
        $employee->save();
        return response()->json(['updatedEmployee' => $employee]);
    }

    public function deleteEmployee($id)
    {

        $count = Employee::destroy($id);

        return response()->json(['deleted' => $count == 1]);
    }

}
