<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function getProductDatabase()
    {
        $start = microtime(true);
        $data = Product::get();
      
        $response = array(
            "response_type" => "Database",
            "response_time" => microtime(true) - $start,
            "data" => $data->toJson()
        );
        return $response;
    }
    public function getProductRedis()
    {
        $start = microtime(true);
    
        if (Cache::has('products')) {
            $data = Cache::get('products');
            $cacheReadTime = microtime(true) - $start;
    
            $response = array(
                "response_type" => "Cache",
                "response_time" => $cacheReadTime,
                "data" => $data
            );
            return $response;
        } else {
          


            $start = microtime(true);
            $data = Product::select('id', 'name', 'price')->get();
            Cache::put('products', $data->toJson(), 120);
            
            $response = array(
                "response_type" => "Database",
                "response_time" => microtime(true) - $start,
                "data" => $data
            );
            return $response;
        }
    }
    
}
