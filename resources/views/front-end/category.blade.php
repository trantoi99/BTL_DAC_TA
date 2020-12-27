@extends('front-end.master')
@section('title','Category Page')
@section('main')
    <link rel="stylesheet" href="css/category.css">

                    <div id="wrap-inner">
                        <div class="products">
                        <div class="product-list row py-3 my-3 px-2 bg-primary"> <h3 class="text-white">Sản phẩm theo danh mục : {{ $category_id->ten_danhmuc }}</h3></div>
                            <div class="product-list row">
                                @foreach($data as $value)
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
                            <div class="pt-3">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
@stop()
