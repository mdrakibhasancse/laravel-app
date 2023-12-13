<?php

namespace App\Repositories;

use App\Interfaces\IProductRepository;
use App\Models\Image;
use App\Models\Product;

class ProductRepository extends BaseRepository implements IProductRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function storeProduct($request){

         try {
            if($request->hasFile('featured_image')){
                $path= $request->file('featured_image')->store('product_images','public');
            }else{
                $path=null;
            }

            $product=$this->model;
            $product->name=$request->name;
            $product->price=$request->price;
            $product->category_id=$request->category_id;
            $product->discount_amount=$request->discount_amount;
            $product->stock=$request->stock;
            $product->description=$request->description;
            $product->featured_image=$path;
            $product->save();

             if($request->hasFile('images')){
                 foreach($request->file('images') as $image) {
                    $path=$image->store('product_images','public');
                    $image=new Image();
                    $image->path=$path;
                    $image->product_id=$product->id;
                    $image->save();
                 }
             }



            flash('product create success.')->success();
         } catch (\Throwable $th) {
            flash('something Wrong.')->success();
         }
    }

    public function updateProduct($request,$id){
        $product=$this->myFind($id);
        if(!$product){
           return false;
        }
        $product->name=$request->name;
        $product->price=$request->price;
        $product->category_id=$request->category_id;
        $product->discount_amount=$request->discount_amount;
        $product->stock=$request->stock;
        $product->description=$request->description;
        $product->save();
        flash('Category update success.')->success();
        return true;
    }

    public function deleteProduct($id){
         $product=$this->myFind($id);
         if(!$product){
             return false;
         }
         $product->images()->delete();
         $product->product_types()->delete();
         $product->delete();
         flash('Product Delete success.')->success();
         return true;
    }

    public function GetLatestProduct(){
         return $this->model
         ->take(6)
         ->orderBy('created_at','desc')
         ->get();
    }

    public function GetSpecialProduct(){
        return $this->model
        ->where('discount_amount','!=', 0)
        ->take(6)
        ->orderBy('discount_amount','desc')
        ->get();
    }

    public function GetRandomProduct(){
        return $this->model
        ->take(6)
        ->get();
    }
}
