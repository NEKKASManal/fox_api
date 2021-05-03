<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $products = DB::table('products')->get();
        $products =  $products->toJson();
        $products =  json_decode($products);
        return view('products.index',['products'=> $products]);
        // return dd($resa);
    }

    public function create()
    {
        //return view('products.products.create');
    }

    public function store(Request $request)
    {
        //$this->withoutMiddleware();

        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        Product::create($request->all());
    
        return redirect()->route('product.index')->with('success','Product created.');
    }

    public function show($id)
    {
        // $resa = DB::table('products')->where('id',$id);
        $product = Product::findOrFail($id);
        // return $resa->toJson();
        // return response()->json($resa);

        return view('products.show',['product'=>$product]);

    }

    public function edit($id)
    {
        $product=Product::findOrFail($id);
        return view('products.edit',['product'=>$product]);
    }

    public function update(Request $request,$id)
    {
        $nom = $request['name'];
        //$id = $request['id'];
        $detail = $request['detail'];
        //dd($request['name']);
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        //dd($id);
        Product::where('id',$id)->update(['name'=> $nom, 'detail'=> $detail]);
        //return view('products.edit',['product'=>$product]);
        return redirect()->route('product.index')->with('success','Product updated successfully');
        
    }

    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        //dd($id);
       // Product::find($id)->delete();
        // $product->delete();
        
        return redirect()->route('product.index')->with('success','Product deleted successfully');
    }
}
