@extends('front-end.master') @section('title','Search Page') @section('main')
<link rel="stylesheet" href="css/search.css">
<div id="wrap-inner" style="margin-bottom: 32px;">
    <div class="products">
    <div class="product-list row py-3 my-3 px-2 bg-primary"> <h3 class="text-white text-capitalize">Tìm kiếm với từ khóa :&nbsp;{{$keywords}} </h3></div>
        <div class="product-list row">
            @foreach($item as $value)
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
@stop()
