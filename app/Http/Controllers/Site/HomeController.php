<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Interfaces\IProductRepository;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productRepo;

    public function __construct(IProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }


    public function index(){

        $data['latest_product']=$this->productRepo->GetLatestProduct();
        $data['special_product']=$this->productRepo->GetSpecialProduct();
        $data['random_product']=$this->productRepo->GetRandomProduct();
        return view('site.home',$data);
    }

    public function single_product($id){
        $data['single_product']=$this->productRepo->myFind($id);
        return view('site.single_product',$data);
    }

    public function search(Request $request){
         $request->validate(['search'=>'required']);
         $data['books']=Product::where('name','like','%'.$request->search.'%')->get();
         return view('site.search',$data);
    }


    public function searchAjax(Request $request){
        $request->validate(['search'=>'required']);
        $data['books']=Product::where('name','like','%'.$request->search.'%')
        ->take(5)
        ->get();
        return view('site.search_ajax',$data);
   }
}
