<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryRequest;
use App\Http\Requests\ProductSuperCategoryRequest;
use App\Models\ProductMainCategory;
use App\Models\ProductSuperCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductController extends Controller
{
   
    public function saveMainCategory(ProductCategoryRequest $request){


        $mainCategories = $request->main_category;
        $mainImages = $request->hasFile('item_images') ? $request->file('item_images') : [];

        foreach($mainCategories as $item=>$category){
         
           // Check if an image exists for the current category
           if(isset($mainImages[$item])){
            $image = $mainImages[$item]; // Get the corresponding image file
            $originalFileName = $image->getClientOriginalName(); // Get the original file name
            $path='upload_images/mainPoster';
            $image->move($path, $originalFileName); // Move the file to the specified path
           }
          
            ProductMainCategory::create([
                'main_cname'=>$category,
                'main_cslug_name'=>Str::slug($category),
                'main_image'=> $path . '/' . $originalFileName,
                'main_image_xp'=>null,
                'main_cstatus'=>1
                 
             ]);

        }

        return response()->json([
            'message' =>'Saved Main Category successfully',
        ]);
   
    }

    public function getMainCategory(Request $request){
        $getdata=ProductMainCategory::all();
       
        return response()->json([
            'data' => $getdata,
        ]);
    }

    public function saveSuperCategory(ProductSuperCategoryRequest $request){


        $superCategories = $request->super_category;
        $superImages = $request->hasFile('item_images') ? $request->file('item_images') : [];

        foreach($superCategories as $item=>$category){
         
           // Check if an image exists for the current category
           if(isset($mainImages[$item])){
            $image = $superImages[$item]; // Get the corresponding image file
            $originalFileName = $image->getClientOriginalName(); // Get the original file name
            $path='upload_images/mainPoster';
            $image->move($path, $originalFileName); // Move the file to the specified path
           }
          
            ProductSuperCategory::create([
                'sup_cname'=>$category,
                'sup_cslug_name'=>Str::slug($category),
                'sup_image'=> $path . '/' . $originalFileName,
                'sup_cstatus'=>1,
                // 'product_description'=>'',
                 
             ]);
            }

        return response()->json([
            'message' =>'Saved Super Category successfully',
        ]);
    }
}
