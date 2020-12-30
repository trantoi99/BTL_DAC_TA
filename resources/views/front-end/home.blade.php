@extends('front-end.master')
@section('title','Home Page')
@section('main')

                    <div id="wrap-inner">
                        <div class="products">
                            <div class="product-list row py-3 my-3 px-2 bg-primary"> <h3>Sản phẩm</h3></div>
                            <div class="product-list row">
                            @foreach($data as $prod_spe)
                                <div class="product-item col-md-4">
                                    <img src="{{$prod_spe->LinkAnh }}" class="img-thumbnail" alt="{{$prod_spe->Ten_Sp}}">
                                    <p>{{$prod_spe->ten_sp}}</p>
                                    <p class="price">{{number_format($prod_spe->Gia,0,',','.')}} VNĐ</p>
                                    <div class="marsk">
                                        <a href="/api/cart/insert/{{ $prod_spe->Id_Sp }}">Thêm giỏ hàng</a>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <div class="center pt-3">
                                {{ $data->links() }}
                            </div>
                        </div>
@stop()
