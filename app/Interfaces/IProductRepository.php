<?php

namespace App\Interfaces;

interface IProductRepository extends IBaseRepository
{
    public function storeProduct($request);
    public function updateProduct($request,$id);
    public function deleteProduct($id);
    public function GetLatestProduct();
    public function GetSpecialProduct();
    public function GetRandomProduct();
}
