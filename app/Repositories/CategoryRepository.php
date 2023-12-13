<?php

namespace App\Repositories;

use App\Interfaces\ICategoryRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function storeCategory($request){
        $categories=$this->model;
        $categories->name=$request->name;
        $categories->main_category_id=$request->main_category_id;
        $categories->save();
        flash('Category create success.')->success();
    }

    public function updateCategory($request,$id){
        $category=$this->myFind($id);
        if(!$category){
           return false;
        }
         $category->name=$request->name;
         $category->main_category_id=$request->main_category_id;
         $category->save();
         flash('Category update success.')->success();
         return true;
    }

    public function deleteCategory($id){
        $category=$this->myFind($id);
        if(!$category){
            return false;
        }
        // dd($category->products());
        foreach ($category->products() as $value){
            $value->images()->delete();
        }


        $category->products()->delete();
        $category->delete();
        flash('Category Delete success.')->success();
        return true;
   }

}
