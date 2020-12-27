@extends('front-end.master') @section('title','Detail Page') @section('main')

<link rel="stylesheet" href="css/details.css">

<div id="wrap-inner pb-3">
    <div class="row py-4">
        <div id="product-img" class="col-md-6 text-center">
            <img src="{{asset('/front-end/img/details/'. $value->hinhanh_sp)}}" class="img-fluid" alt="{{$value->ten_sp}}">
        </div>
        <div class="col-md-6 my-auto">
            <div style="color: red" class="pb-3">
                <h3>{{$value->ten_sp}} </h3>
            </div>
            <div class="d-flex">
                <div>
                    <h3>Giá : </h3>
                </div>
                <div class="pl-2">
                    <h3>{{number_format($value->prod_price*(100-$value->khuyenmai)/100,0,',','.')}} VNĐ</h3>
                </div>
            </div>
            <div class="mt-3">
                <a class="btn btn-primary btn-xl" style="padding: 16px 110px;" href="{{route('cart.add',$value->id_sp)}}">Đặt hàng online</a>
            </div>
        </div>
    </div>

    <div class="ml-auto">
        <div class="detail__title--color pb-4">
            <h3 class="text-primary">Chi tiết sản phẩm</h3>
        </div>
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>

                    <td>
                        <h5>Tên Sản Phẩm</h5>
                    </td>
                    <td>
                        <h5>{{$value->ten_sp}}</h5>
                    </td>
                </tr>
                <tr>

                    <td>
                        <h5>Hệ Điều Hành</h5>
                    </td>
                    <td>
                        <h5>{{$value->hedieuhanh}}</h5>
                    </td>
                </tr>
                <tr>

                    <td>
                        <h5>Loại Màn Hình</h5>
                    </td>
                    <td>
                        <h5>{{$value->manhinh}}</h5>
                    </td>
                </tr>
                <tr>

                    <td>
                        <h5>Ram</h5>
                    </td>
                    <td>
                        <h5>{{$value->ram}}</h5>
                    </td>
                </tr>
                <tr>

                    <td>
                        <h5>Bộ Nhớ Trong</h5>
                    </td>
                    <td>
                        <h5>{{$value->rom}}</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Camera</h5>
                    </td>
                    <td>
                        <h5>{{$value->camera_sau}}</h5>
                    </td>
                </tr>
                <tr>

                    <td>
                        <h5>CPU</h5>
                    </td>
                    <td>
                        <h5>{{$value->cpu}}</h5>
                    </td>
                </tr>
                <tr>

                    <td>
                        <h5>Card Màn Hình</h5>
                    </td>
                    <td>
                        <h5>{{$value->card_mh}}</h5>
                    </td>
                </tr>
                <tr>

                    <td>
                        <h5>Giá Sản Phẩm</h5>
                        <td>
                            <h5>{{number_format($value->prod_price,0,',','.')}} VNĐ</h5>
                        </td>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="product-list row py-3 px-2 mb-3 bg-primary">
        <h3 class="text-white">Sản phẩm liên quan</h3>
    </div>
    <div class="product-list row pb-4">
        @foreach($products as $item)
        <div class="product-item col-md-4">
            <img src="{{asset('/front-end/img/details/'. $item->hinhanh_sp)}}" class="img-thumbnail" alt="{{$value->ten_sp}}">
            <p>{{$item->ten_sp}}</p>
            <p class="price">{{number_format($item->prod_price,0,',','.')}} VNĐ</p>
            <div class="marsk">
                <a href="{{asset('detail/'.$value->id_sp.'.html')}}">Xem chi tiết</a>
            </div>
        </div>
        @endforeach
    </div>
</div>


</div>

@stop()
