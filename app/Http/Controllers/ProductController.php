<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Image;
//use Intervention\Image\Facades\Image;
use Storage;
use Input;
class ProductController extends Controller
{
    public function __construct() {
        return $this->middleware('auth', ['except' => []]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $all_product = Product::with('Category')->get();
        $all_category = Category::all();
        return view('products/products')->with('all_product', $all_product)->with('all_category', $all_category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'addimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            'addname' => 'required',
            'addcateg_id' => 'required',
            ]);

        $product = new Product();
        $product->name = $request->input('addname');
        $product->category_id = $request->input('addcateg_id');

        if($file = $request->hasFile('addimage')) {
            $file = $request->file('addimage');
            $fileName = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path() . '/images/';
            $file->move($destinationPath, $fileName);
            $product->image = $fileName;
        }
        try {
            $product->save();
            return redirect('products')->with('success','Your product successfuly stored :) ');
        } catch(\Exception $e) {
            return redirect('/products')->with('error', 'Sorry but have an error while create your Product plz try agian');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            'name' => 'required',
            'categ_id' => 'required',
        ]);
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->category_id = $request->input('categ_id');

        if($file = $request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path() . '/images/';
            $file->move($destinationPath, $fileName);
            $product->image = $fileName;
        }
        $product->save();
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['success' => 'Your product is successfully deleted']);
    }
}
