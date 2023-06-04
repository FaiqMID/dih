<?php

namespace App\Http\Controllers;

use App\Models\Search;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Search::truncate();
        $saveSearches = DB::table('products')->get();
        foreach($saveSearches as $saveSearch)
        {
            $search = new Search();
            $search->id = $saveSearch->id;
            $search->product_name = $saveSearch->product_name;
            $search->product_description = $saveSearch->product_description;
            $search->product_price = $saveSearch->product_price;
            $search->product_category_id = $saveSearch->product_category_id;
            $search->store_branch_id = $saveSearch->store_branch_id; 
            $search->save();
        }
        $products = Product::paginate(10);
        // dd($products);
        return view('catalogue', ['products' => $products]);
    }

    public function searchProduct(Request $request){
        Search::truncate();
        $cari = $request->search;
		$saveSearches = DB::table('products')->where('product_name','like',"%".$cari."%")->get();
        foreach($saveSearches as $saveSearch)
        {
            $search = new Search();
            $search->id = $saveSearch->id;
            $search->product_name = $saveSearch->product_name;
            $search->product_description = $saveSearch->product_description;
            $search->product_price = $saveSearch->product_price;
            $search->product_category_id = $saveSearch->product_category_id;
            $search->store_branch_id = $saveSearch->store_branch_id; 
            $search->save();
        }
        $products = Product::where('product_name','like',"%".$cari."%")->paginate(10);
		return view('catalogue', ['products' => $products]);
    }

    public function sortProduct(Request $request){
        $type = $request->sort;
        if($type == "name") {
            $products = Search::orderBy('product_name')->paginate(10);
        } else if($type == "latest") {
            $products = Search::latest()->paginate(10);
        } else if($type == "priceDesc") {
            $products = Search::orderBy('product_price', 'desc')->paginate(10);
        } else if($type == "priceAsc") {
            $products = Search::orderBy('product_price')->paginate(10);
        } else {
            $products = Search::paginate(10);
        }
		return view('catalogue', ['products' => $products]);
    }

    public function showProduct($id){
        $product = Product::where('id',$id)->firstOrFail();
        return view('product', ['product' => $product]);
    }

    public function indexAdmin(){
        $products = Product::paginate(5);
        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product();
        $product->product_name = $request->name;
        $product->product_description = $request->description;
        $product->product_price = $request->price;
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $destinationPath = 'build/assets/images/items/';
            $request->image->move(public_path($destinationPath), $imageName);
            $product->image = $imageName;
        }
        $product->save();
        return redirect(route('admin.catalogue'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
    }

    public function edit($id)
    {
        $data = Product::where('id', $id)->first();
        return view('product.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::where('id', $request->id)->first();
    
        $product->product_name = $request->name;
        $product->product_description = $request->description;
        $product->product_price = $request->price;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
    
            // Delete the previous image if it exists
            if (!empty($product->image)) {
                $imagePath = public_path('build/assets/images/items/' . $product->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
    
            $image->move(public_path('build/assets/images/items/'), $imageName);
    
            $product->image = $imageName;
        }
    
        $product->save();
        return redirect(route('admin.catalogue'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $product = Product::where('id', $request->id)->first();
        
        // Delete the item's image if it exists
        if (!empty($product->image)) {
            $imagePath = public_path('build/assets/images/items/' . $product->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $product->delete();

        return redirect()->back()->with('success', 'Item deleted successfully.');
    }
}
