<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Partner;
use App\Employee;
use App\Extype;
class ExpensesController extends Controller
{

    public function __construct() {
        return $this->middleware('auth', ['except' => []]);
    }

    /* ------------------------------------------------------------- */
    # Main View page for Expenses_info
    /* ------------------------------------------------------------- */
    public function index(){
        $all_expenses = Expense::with('type')->with('employee')->with('type')->get();
        $all_partner = Partner::all();
        $all_employee = Employee::all();
        $all_type = Extype::all();
//        echo response()->json($all_expenses);
        return view('home/expenses')->with('all_expenses', $all_expenses)->with('all_partner', $all_partner)->with('all_employee', $all_employee)->with('all_type', $all_type);
    }

    /* ------------------------------------------------------------- */
    # add View page for Expenses
    /* ------------------------------------------------------------- */
    public function add(Request $request){

        $expenses = new Expense();
        $expenses->soe = $request->input('addsoe');
        $expenses->qty = $request->input('addqty');
        $expenses->unit_price = $request->input('addprice');
        $expenses->notes = $request->input('addnotes');
        $expenses->partner_id = $request->input('addpartnerid');
        $expenses->type_id = $request->input('addtype');
        $expenses->empl_id = $request->input('addofficer');
        try {
            $expenses->save();
            return response()->json($expenses);
//            return redirect('/expenses')->with('success', 'تم حفظ الصرف بنجاح');
        } catch(\Exception $e) {
            return redirect('/expenses')->with('error', 'حدث خطأ اثناء حفظ عميل جديد');
        }
    }

    /* ------------------------------------------------------------- */
    # Edit Page
    /* ------------------------------------------------------------- */

    public function update(Request $request,$id)
    {
        $expense = Expense::find($id);
        $expense->soe = $request->input('soe');
        $expense->qty = $request->input('qty');
        $expense->unit_price = $request->input('price');
        $expense->notes = $request->input('note');
        $expense->partner_id = $request->input('partnerid');
        $expense->type_id = $request->input('type');
        $expense->empl_id = $request->input('officer');
        try {
            $expense->save();
//            return redirect('/expenses')->with('success', 'Your Expenses is successfully updated.');
            return response()->json($expense);
        } catch(\Exception $e) {
            return response()->json(['error' => $e]);
        }
    }

    /* ------------------------------------------------------------- */
    # Delete Page
    /* ------------------------------------------------------------- */

    public function delete($id){
        Expense::destroy($id);
        return response()->json(['success' => 'Your inquire is successfully sent']);
    }

}
