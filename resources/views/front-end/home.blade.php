@extends('front-end.master')
@section('title','Home Page')
@section('main')

                    <div id="wrap-inner">
                        <div class="products">
                            <div class="product-list row py-3 my-3 px-2 bg-primary"> <h3>Sản phẩm nổi bật</h3></div>
                            <div class="product-list row">
                            @foreach($data as $prod_spe)
                                <div class="product-item col-md-4">
                                    <div class="py-2">
                                        <marquee>
                                            <p class="sale" style="font-size: 22px;">Giảm giá {{$prod_spe->khuyenmai}}%</p>
                                        </marquee>
                                    </div>
                                    <img src="{{asset('/front-end/img/details/'. $prod_spe->hinhanh_sp)}}" class="img-thumbnail" alt="{{$prod_spe->ten_sp}}">
                                    <p>{{$prod_spe->ten_sp}}</p>
                                    <p class="price">{{number_format($prod_spe->prod_price*(100-$prod_spe->khuyenmai)/100,0,',','.')}} VNĐ</p>
                                    <div class="marsk">
                                        <a href="{{asset('detail/'.$prod_spe->id_sp.'.html')}}">Xem chi tiết</a>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <div class="center pt-3">
                                {{ $data->links() }}
                            </div>
                        </div>

                        <div class="products">
                            <div class="product-list row py-3 px-2 mb-3 bg-primary"> <h3>Danh sách sản phẩm</h3></div>
                            <div class="product-list row">
                            @foreach($lst_product as $value)
                                <div class="product-item col-md-4">
                                    <img src="{{asset('/front-end/img/details/'. $value->hinhanh_sp)}}" class="img-thumbnail" alt="{{$value->ten_sp}}">
                                    <p>{{$value->ten_sp}}</p>
                                    <p class="price">{{number_format($value->prod_price,0,',','.')}} VNĐ</p>
                                    <div class="marsk">
                                        <a href="{{asset('detail/'.$value->id_sp.'.html')}}">Xem chi tiết</a>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <div class="center pt-3">
                                {{ $lst_product->links() }}
                            </div>
                        </div>
                    </div>
@stop()
