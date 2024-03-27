<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Material;
use App\Models\ProdImage;
use App\Models\Product;
use App\Models\Subcat;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['products'] = Product::orderBy('id', 'desc')->get();
        //dd(Product::find(5)->images);
        return view('dashboard.products.show-products', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $data['subcats'] = Subcat::All();
        $data['materials'] = Material::All();
        return view('dashboard.products.create-product', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product;

        $product->name=$request->input('name');
        $product->subcat_id=$request->input('subcat_id');
        $product->material_id=$request->input('material_id');
        $product->id_number=$request->input('id_number');
        $product->suplier_code=$request->input('suplier_code');
        $product->quantity=$request->input('quantity');
        $product->price=$request->input('price');
        $product->description_fr=$request->input('description_fr');
        $product->short_description_fr=$request->input('short_description_fr');
        $product->description_en=$request->input('description_en');
        $product->short_description_en=$request->input('short_description_en');
        $product->uniq_id='id'.time();
        $product->save();
        $product_id = $product->id;

        if($request->has('image')){
            //$i = 0;
            foreach($request->file('image') as $image){
                $img = new ProdImage;

                $img->src = $image->store('products');
                $img->product_id = $product_id;

                $img->save();
                //$i++;
            }
        }


        return redirect()->route('products.index', app()->getLocale())->with('success', 'Product has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show($lang, Product $product)
    {
        $data['categories'] = Pcategory::orderBy('id', 'desc')->get();
        $data['tags'] = Ptag::orderBy('id', 'desc')->get();
        $data['product'] = $product;
        return view('dashboard.products.show-product', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit($lang, $product)
    {
        $data['subcats'] = Subcat::All();
        $data['product'] = Product::find($product);
        $data['materials'] = Material::All();


        return view('dashboard.products.edit-product', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return Response
     */
    public function update(UpdateProductRequest $request, $lang,  $product)
    {

        $product = Product::find($product);

        $product->name=$request->input('name');
        $product->subcat_id=$request->input('subcat_id');
        $product->material_id=$request->input('material_id');
        $product->id_number=$request->input('id_number');
        $product->suplier_code=$request->input('suplier_code');
        $product->quantity=$request->input('quantity');
        $product->price=$request->input('price');
        $product->description_fr=$request->input('description_fr');
        $product->short_description_fr=$request->input('short_description_fr');
        $product->description_en=$request->input('description_en');
        $product->short_description_en=$request->input('short_description_en');
        $product->save();
        $product_id = $product->id;

        if($request->has('image')){

            foreach ($product->images as $img){
                Storage::delete($img->src);
                $img->delete();
            }



            //$i = 0;
            foreach($request->file('image') as $image){
                $img = new ProdImage;

                $img->src = $image->store('products');
                $img->product_id = $product_id;

                $img->save();
                //$i++;
            }
        }


        return redirect()->route('products.index', app()->getLocale())->with('success', 'Product has been added successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
