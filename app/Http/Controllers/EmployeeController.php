<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index');
    }

    public function getEmployee(Request $request)
    {
        // $result = [];
        $employee = DB::select("SELECT emp.name as employee, data_emp.authen_date as authen_date, data_emp.time_in as time_in, data_emp.time_out as time_out, data_emp.total_hours as total_hours, data_emp.notes as notes
                                FROM data_employee as data_emp
                                LEFT JOIN employee as emp
                                ON (data_emp.employee_id = emp.id)
                                WHERE authen_date BETWEEN ? AND ?
                                ORDER BY employee", [$request->awal, $request->akhir]);
        // dd($employee);
        return $employee;
    }

    public function chart()
    {
        return view('employee.chart');
    }

    public function getChartEmployee(Request $request)
    {
        $result = [];
        $employee = DB::select("SELECT employee_id, total_hours as second
                                FROM data_employee
                                -- JOIN employee as emp
                                WHERE authen_date BETWEEN ? AND ?
                                GROUP BY employee_id", [$request->awal, $request->akhir]);
        // dd($employee);

        // foreach ($employee as $value) {
        //     array_push($result, [
        //         'employee_id' => $value->employee_id,
        //         'seconds' => $value->second,
        //     ]);
        // }
        return $result;
    }

    public function diagram()
    {
        return view('employee.diagram');
    }

    public function getDiagramEmployee()
    {

    }
}
