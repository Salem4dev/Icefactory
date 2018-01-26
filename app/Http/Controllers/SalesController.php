<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Customer;

class SalesController extends Controller
{

    public function __construct() {
        return $this->middleware('auth', ['except' => []]);
    }
    /* ------------------------------------------------------------- */
    # Main View page for Sales_info
    /* ------------------------------------------------------------- */
    public function index(){
        $all_Sales = Sale::with('customer')->get();
        $all_cu = Customer::all();
//        return dd($all_Sales);
        return view('sales/daily_sales')->with('all_Sales', $all_Sales)->with('all_cu', $all_cu);
    }
    /* ------------------------------------------------------------- */
    # add View page for Sales_info
    /* ------------------------------------------------------------- */
    public function add(Request $request){

        $Sales = new Sale();
        $Sales->from_check = $request->input('addfrom');
        $Sales->to_check = $request->input('addto');
//        $Sales->number_checks = $request->input('addnumber');
        $Sales->halek = $request->input('addhalek');
        $Sales->Snowboard_price = $request->input('addprice');
//        $Sales->total_price = $request->input('addtotal');
        $Sales->customer_id = $request->input('addcustomerid');
        try {
            $Sales->save();
            return response()->json([$Sales,'success' => 'Your Sales is successfully sent.']);
        } catch(\Exception $e) {
            return redirect('/daily_sales')->with('error', 'حدث خطأ اثناء حفظ عميل جديد');
        }
    }

    /* ------------------------------------------------------------- */
    # Edit Page
    /* ------------------------------------------------------------- */

    public function update(Request $request,$id)
    {
        $Sales = Sale::find($id);
        $Sales->from_check = $request->input('from');
        $Sales->to_check = $request->input('to');
//        $Sales->number_checks = $request->input('number');
        $Sales->halek = $request->input('halek');
        $Sales->Snowboard_price = $request->input('price');
//        $Sales->total_price = $request->input('total');
        $Sales->customer_id = $request->input('customerid');
        $Sales->save();
        return response()->json(['success' => 'Your Sales is successfully updated.']);

    }

    /* ------------------------------------------------------------- */
    # Delete Page
    /* ------------------------------------------------------------- */

    public function delete($id){
        Sale::destroy($id);
        return response()->json(['success' => 'Your inquire is successfully sent']);
    }

    /* ------------------------------------------------------------- */
    # monthly_sales Page
    /* ------------------------------------------------------------- */

    public function monthly_sales(){
        return view('sales/monthly_sales');
    }

    /* ------------------------------------------------------------- */
    # yearly_sales Page
    /* ------------------------------------------------------------- */
    public function yearly_sales(){
        return view('sales/yearly_sales');
    }


}
