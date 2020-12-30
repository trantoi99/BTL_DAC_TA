<?php

namespace App\Http\Controllers;

use App\san_pham;

class HomeController extends Controller
{
    public function getHome(){
        //get sp dac biet
        $data = san_pham::join('anhs', 'san_phams.Id_Sp', '=', 'anhs.Id_Sp')
                        ->select(['san_phams.*', 'anhs.Ten_anh as LinkAnh'])
                        ->paginate(6);
        return view('front-end.home')->with(['data' => $data]);
    }

    // get detail page
    // public function getDetail($id){

    //     $sanpham_dacbiet = DB::table('sanpham_dacbiet')->where('id_sp', '=', $id)->get();
    //     if(count($sanpham_dacbiet) > 0){
    //         $value = Product::join('sanpham_dacbiet', 'sanpham.id_sp', '=', 'sanpham_dacbiet.id_sp')
    //         ->where('sanpham.id_sp', $id)
    //         ->first(['sanpham.*', 'sanpham_dacbiet.id_ssp', 'sanpham_dacbiet.khuyenmai']);
    //     }
    //     else{
    //         $value = Product::where('id_sp', '=', $id)->first();
    //     }
    //     $brand = Brand::all();
    //     $category = Category::all();
    //     $products = Product::where('id_hang', '=', $value->id_hang)->orderBy('id_sp','desc')->paginate(6);
    //     return view('front-end.details')->with(['value' => $value])->with(['brand' => $brand])
    //     ->with(['category' => $category, 'products' => $products]);
    // }

    // // get brand
    // public function getBrand($id){
    //        $data = Product::where('id_hang' , '=', $id)->paginate(6);
    //        $brand = Brand::all();
    //        $category = Category::all();
    //        $brand_id = Brand::where('id_hang', '=', $id)->first();
    //        return view('front-end.brand')->with(['data' => $data, 'brand' => $brand, 'brand_id' => $brand_id])->with(['category' => $category]);
    // }
    // //get category
    // public function getCategory($id){
    //         $data = Product::where('id_danhmuc' , '=', $id)->paginate(6);
    //         $brand = Brand::all();
    //         $category = Category::all();
    //         $category_id = Category::where('id_danhmuc', '=', $id)->first();
    //         return view('front-end.category')->with(['data' => $data,'category'=>$category ,'category_id' => $category_id])->with(['brand' => $brand]);
    // }

    // public function getSearch(Request $request){
    //     $result = $request->result;
    //     $brand = Brand::all();
    //     $category = Category::all();
    //     $item = DB::table('sanpham')->where('ten_sp','like','%'.$result.'%')->get();
    //     return view('front-end.search')->with(['keywords' =>$result,'item'=>$item, 'brand' => $brand,'category'=>$category]);
    // }

}
