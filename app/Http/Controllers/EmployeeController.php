<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
//use Mockery\Generator\Method;
use Carbon\Carbon;
class EmployeeController extends Controller
{
    public function __construct() {
        return $this->middleware('auth', ['except' => []]);
    }
    /* ------------------------------------------------------------- */
    # Main View page for Employee_info
    /* ------------------------------------------------------------- */
    public function index(){
        $all_employee = Employee::all();
//        return response()->json($all_employee);
        return view('employee/employee_info')->with('all_employee', $all_employee);
    }
    /* ------------------------------------------------------------- */
    # add View page for Employee_info
    /* ------------------------------------------------------------- */
    public function add(Request $request){

        $employee = new Employee();
        $employee->name = $request->input('addname');
//        $employee->birth_day = $request->input('addbirth_day');
        $employee->birth_day = Carbon::createFromFormat('Y-m-d', $request->input('addbirth_day'));
        $employee->phone = $request->input('addphone');
        $employee->address = $request->input('addaddress');
        try {
            $employee->save();
            return response()->json($employee);
        } catch(\Exception $e) {
            return redirect('/Employee_info')->with('error', 'حدث خطأ اثناء حفظ عميل جديد');
        }
    }

    /* ------------------------------------------------------------- */
    # Edit Page
    /* ------------------------------------------------------------- */

    public function update(Request $request,$id)
    {
        $employees = Employee::find($id);
        $employees->name = $request->input('name');
//        $employees->birth_day = $request->input('birth_day');
        $employees->birth_day = Carbon::createFromFormat('Y-m-d', $request->input('birth_day'));
        $employees->phone = $request->input('phone');
        $employees->address = $request->input('address');
        $employees->save();
        return response()->json(['success' => 'Your Employee is successfully updated.']);

    }


    /* ------------------------------------------------------------- */
    # Delete Page
    /* ------------------------------------------------------------- */

    public function delete($id){
        Employee::destroy($id);
        return response()->json(['success' => 'Your inquire is successfully sent']);
    }

    /* ------------------------------------------------------------- */
    # fixed_assets Page
    /* ------------------------------------------------------------- */
    public function fixed_assets(){
        return view('employee/fixed_assets');
    }

    /* ------------------------------------------------------------- */
    # incidental_expenses Page
    /* ------------------------------------------------------------- */

    public function incidental_expenses(){
        return view('employee/incidental_expenses');
    }

    /* ------------------------------------------------------------- */
    # hodor_insraf Page
    /* ------------------------------------------------------------- */

    public function hodor_insraf(){
        return view('employee/hodor_insraf');
    }

    /* ------------------------------------------------------------- */
    # salary Page
    /* ------------------------------------------------------------- */
    public function salary(){
        return view('employee/salary');
    }
}
