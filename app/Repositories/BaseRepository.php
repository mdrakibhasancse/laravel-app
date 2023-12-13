<?php

namespace App\Repositories;

use App\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function myGet(){
        return $this->model->get();
    }

    public function myFind($id){
       $data=$this->model->find($id);
       if(!$data){
         flash('Data Not Found.')->error();
         return null;
       }else{
           return $data;
       }
    }

    public function myDelete($id){
        $data=$this->model->find($id);
        if(!$data){
          flash('Data Not Found.')->error();
        }else{
            $data->delete();
            flash('Delete success.')->success();
        }
    }
}
