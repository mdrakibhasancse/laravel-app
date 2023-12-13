<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Interfaces\IProductRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $productRepo;

    public function __construct(IProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }


    public function cart_product($product_id){

        $product = $this->productRepo->myFind($product_id);
        if($product){
            \Cart::add(array(
                'id' => $product->id, // inique row ID
                'name' => $product->name,
                'price' => $product->price_discount,
                'quantity' => 1,
                'attributes' => array(
                    'featured_image' => $product->featured_image,
                  )
            ));
            return redirect("/");
        }else{
           return redirect("/");
        }

    }

    public function checkout(){
        $cartCollection = \Cart::getContent();
        $data['cartCollection']=$cartCollection;
        // dd($data['cartCollection']);
        // foreach($cartCollection as $c){
        //     echo $c->id."<br>";
        // }
        // exit();
        return view('site.cart.checkout',$data);
    }

    public function cartRemove($id){
        \Cart::remove($id);
        return redirect("/checkout");
    }



    public function remove_one_product($id){
        $data=\Cart::get($id);
        if($data->quantity==1){
            \Cart::remove($id);
        }else{
            \Cart::update($id, array(
                'quantity' => -1,
              ));
        }
        return redirect("/checkout");
    }

    public function add_one_product($id){

        $product=$this->productRepo->myFind($id);

        $data=\Cart::get($id);
        if($product->stock > $data->quantity){
            \Cart::update($id, array(
                'quantity' => 1,
              ));
        }
        return response("Success",200);

    }
}
