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

        $sales = new Sale();
        $sales->from_check = $request->input('addfrom');
        $sales->to_check = $request->input('addto');
        $sales->number = $request->input('addnumber');
        $sales->halek = $request->input('addhalek');
        $sales->Snowboard_price = $request->input('addprice');
        $sales->customer_id = $request->input('addcustomerid');
        try {
            $sales->save();
            return response()->json($sales);
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
        $Sales->number = $request->input('number');
        $Sales->halek = $request->input('halek');
        $Sales->Snowboard_price = $request->input('price');
        $Sales->customer_id = $request->input('customerid');
        $Sales->save();
        return response()->json($Sales);

    }

    /* ------------------------------------------------------------- */
    # Delete Page
    /* ------------------------------------------------------------- */

    public function delete($id){
        Sale::destroy($id);
        return response()->json(['success' => 'Your inquire is successfully sent']);
    }

}
