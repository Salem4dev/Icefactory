<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use App\Employee;
//class EmployController extends Controller
//{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        $all_employee = Employee::all();
//        return view('employee/employee_info')->with('all_employee', $all_employee);
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
///*    public function create()
//    {
//        //
//    }*/
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        $employee = new Employee();
//        $employee->name = $request->input('addname');
//        $employee->age = $request->input('addage');
//        $employee->phone = $request->input('addphone');
//        $employee->adress = $request->input('addaddress');
//        try {
//            $employee->save();
//        } catch(\Exception $e) {
//            return redirect('/employee_info')->with('error', 'Error saving the employee data');
//        }
//        return response()->json([$employee,'success' => 'Your customer is successfully sent.']);
//        return redirect('/employee_info')->with('success', 'تمت اضافة عميل '.$employee->name.' بنجاح ');
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        $all_employee = Employee::find($id);
//        return view('employee/employee_info')->with('all_employee', $all_employee);
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
///*    public function edit($id)
//    {
//        //
//    }*/
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        $employees = Employee::find($id);
//        $employees->name = $request->input('name');
//        $employees->price = $request->input('age');
//        $employees->phone = $request->input('phone');
//        $employees->address = $request->input('adress');
//        $employees->save();
//        return response()->json(['success' => 'Your customer is successfully updated.']);
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        Employee::destroy($id);
//        return response()->json(['success' => 'Your Employee is successfully Deleted']);
//    }
//
//    public function fixed_assets(){
//        return view('employee/fixed_assets');
//    }
//    public function incidental_expenses(){
//        return view('employee/incidental_expenses');
//    }
//    public function hodor_insraf(){
//        return view('employee/hodor_insraf');
//    }
//    public function salary(){
//        return view('employee/salary');
//    }
//}
