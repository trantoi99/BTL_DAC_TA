<?php

namespace App\Http\Controllers;

use App\chitiethoadon;
use App\hoadon;
use App\Models\Brand;
use App\Models\Category;
use App\san_pham;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function add($id)
    {
        $sanpham = san_pham::join('anhs', 'san_phams.Id_Sp', '=', 'anhs.Id_Sp')
                            ->where('san_phams.Id_Sp', '=', $id)
                            ->first(['san_phams.*', 'anhs.Ten_anh as LinkAnh']);

        Cart::add(array(
            'id' => $sanpham->Id_Sp,
            'name' => $sanpham->Ten_Sp,
            'price' => $sanpham->Gia,
            'quantity' => 1,
            'attributes' => array(
                'more_data'=>$sanpham->LinkAnh
            ),
            'associatedModel' => $sanpham
        ));

        // return redirect()->route('cart.index');
        echo("ok");
    }

    public function index()
    {
        $cartItems = Cart::getContent();
        if(count($cartItems)==0){
            return back()->with(['error'=>'ban chua mua hang']);
        }
        return view('front-end.cart')->with(['cartItems'=>$cartItems]);
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
        $tongtien = Cart::getSubTotal();
        return view('front-end.checkOut');
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
        // $brand = Brand::all();
        // $category = Category::all();
        return view('front-end.complete');
        // ->with(['brand' => $brand])->with(['category' => $category]);
    }
}
