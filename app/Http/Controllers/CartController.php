<?php

namespace App\Http\Controllers;

use App\chitiethoadon;
use App\hoadon;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function add($id)
    {
        // add the product to cart
        $sanpham_dacbiet = DB::table('sanpham_dacbiet')->where('id_sp', '=', $id)->get();
        if(count($sanpham_dacbiet) > 0){
            $product = Product::join('sanpham_dacbiet', 'sanpham.id_sp', '=', 'sanpham_dacbiet.id_sp')
            ->where('sanpham.id_sp', $id)
            ->first(['sanpham.*', 'sanpham_dacbiet.id_ssp', 'sanpham_dacbiet.khuyenmai']);
        }
        else{
            $product = Product::where('id_sp', '=', $id)->first();
        }
        Cart::add(array(
            'id' => $product->id_sp,
            'name' => $product->ten_sp,
            'price' => $product->prod_price*(100-$product->khuyenmai)/100,
            'quantity' => 1,
            'attributes' => array(
                'more_data'=>$product->hinhanh_sp
            ),
            'associatedModel' => $product
        ));

        return redirect()->route('cart.index');
    }

    public function index()
    {
        $cartItems = Cart::getContent();
        $brand = Brand::all();
        $category = Category::all();
        if(count($cartItems)==0){
            return back()->with(['brand' => $brand,'category'=>$category,'error'=>'ban chua mua hang']);
        }
        return view('front-end.cart')->with(['cartItems'=>$cartItems, 'brand' => $brand,'category'=>$category]);

    }

    public function destroy($id)
    {
        //delete
        Cart::remove($id);
        $totalPrice = Cart::getSubToTal();
        return response()->json(['id' => $id ,'totalPrice' => $totalPrice]);
    }
    public function update(Request $request)
    {
        //update
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));

        $total = $request->quantity * $request->price;
        $totalPrice = Cart::getSubToTal();
        return response()->json(['id' => $request->id, 'quantity' => $request->quantity, 'total' => $total, 'totalPrice' => $totalPrice]);
    }
    public function getCheckOut(){
        $brand = Brand::all();
        $category = Category::all();
        $tongtien = Cart::getSubTotal();
        if($tongtien == 0){
            return view('front-end.eror')->with(['brand' => $brand])->with(['category' => $category]);;
        }
        else{
            return view('front-end.checkOut')->with(['brand' => $brand])->with(['category' => $category]);
        }
    }

    public function save_cart(Request $request)
    {
        // luu hoa don
        if(!is_null($request->email)){
            $tongtien = Cart::getSubTotal();
            $cart = new hoadon([
                'tenKH' => $request->tenKH,
                'email' => $request->email,
                'sodienthoai' => $request->sodienthoai,
                'diachi' => $request->diachi,
                'tongtien' => $tongtien
            ]);
            if($cart->save()){
                $hoadon = hoadon::where([
                    'tenKH' => $request->tenKH,
                    'email' => $request->email,
                    'sodienthoai' => $request->sodienthoai,
                    'diachi' => $request->diachi,
                    'tongtien' => $tongtien
                ])->first();

                if(!is_null($hoadon)){
                    $product = Cart::getContent();
                    foreach($product as $item){
                        $record = new chitiethoadon([
                            'sanpham_id' => $item->id,
                            'soluong' => $item->quantity
                        ]);

                        $hoadon->chitiethoadon()->save($record);
                    }

                    $sendMail = $this->send_mail($hoadon);
                    if($sendMail == true){
                        return response()->json([
                            'success' => true,
                            'message' => "Đặt hàng thành công!"
                        ]);
                    }
                    else{
                        return response()->json([
                            'success' => false,
                            'message' => "Đặt hàng thất bại!"
                        ]);
                    }
                }
                else{
                    return response()->json([
                        'success' => false,
                        'message' => "Có lỗi xảy ra!"
                    ]);

                }
            }
        }
    }
    public function getComplete(){
        $cart = Cart::clear();
        $brand = Brand::all();
        $category = Category::all();
        return view('front-end.complete')->with(['brand' => $brand])->with(['category' => $category]);
    }
}
