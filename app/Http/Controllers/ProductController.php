<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products= Product::all();

        return view('home',compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function edit($id)
    {
        $product= Product::find($id);

        return view('products.edit',compact('product'));
    }

    public function show()
    {   
        $products= Product::all();

        return view('products.list',compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:250',
            'quantity'=>'required|integer',
            'price'=>'required|integer',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=500',
        ]);

        try {

            if($request->file('image')){
                $file= $request->file('image');
                $filename= time().$file->getClientOriginalName();
                $file-> move(public_path('image'), $filename);
                $data['image']= $filename;
            }
    
            $data['name']=$request->name;
            $data['quantity']=$request->quantity;
            $data['price']=$request->price;
    
            $store = Product::create($data);

            $status ='success';

            $message ='Product Created Successfully';

        } catch (\Throwable $th) {

            $status ='error';

            $message =$th->getMessage();
        }

        return redirect()->back()->with($status, $message);   
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|string|max:250',
            'quantity'=>'required|integer',
            'price'=>'required|integer',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {

            $update=Product::find($id);

            if($request->file('image')){
                $file= $request->file('image');
                $filename= time().$file->getClientOriginalName();
                $file-> move(public_path('image'), $filename);
                $data['image']= $filename;
            }else{
                $data['image']=$update->image;
            }
    
            $data['name']=$request->name;
            $data['quantity']=$request->quantity;
            $data['price']=$request->price;
    
            $update->update($data);

            $status ='success';

            $message ='Product Updated Successfully';

        } catch (\Throwable $th) {

            $status ='error';

            $message =$th->getMessage();
        }

        return redirect()->back()->with($status, $message);
    }

    public function destroy($id)
    {
        try {
            $delete = Product::find($id);

            $delete->delete();

            $status ='success';

            $message ='Product Deleted Successfully';

        } catch (\Throwable $th) {

            $status ='error';

            $message =$th->getMessage();
        }

        return redirect()->back()->with($status, $message);
    }

}
