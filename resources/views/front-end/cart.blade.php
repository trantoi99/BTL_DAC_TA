@extends('front-end.master') @section('title','Cart Page') @section('main')
<link rel="stylesheet" href="css/cart.css">
<div id="wrap-inner">
    <div id="list-cart">
        <div class="row py-3 mb-3 bg-primary text-white mt-3 py-2 px-2 ml-0">
            <h3 class="text-white">Giỏ Hàng</h3>
        </div>
        <form>
            <table class="table table-bordered .table-responsive text-center">
                <tr>
                    <td width="11.111%">Ảnh mô tả</td>
                    <td width="22.222%">Tên sản phẩm</td>
                    <td width="16.6665%">Số lượng</td>
                    <td width="16.6665%">Đơn giá</td>
                    <td width="16.6665%">Thành tiền</td>
                </tr>
                @foreach($cartItems as $item)
                <tr id="item{{ $item->id }}">
                    <td><img class="img-responsive" src="{{$item->attributes->more_data}}" alt="{{$item->name}}"></td>
                    <td>{{$item->name}}</td>
                    <td class="text-center">
                        <div class="quantity_group justify-content-center">
                            <button type="button" class="minus btn-number" onclick="updateCart({{ $item->id }})" data-type="minus" data-field="{{ $item->id }}"><i class="fa fa-minus" aria-hidden="true"></i></button>
                            <input class="form-control input-number" style="border: none;outline: none;text-align: center;" name="{{ $item->id }}" type="text" value="{{ $item->quantity }}" min="1" max="100" id="{{ $item->id }}" onkeyup="updateCart({{ $item->id }})" data-price="{{ $item->price }}">
                            <button type="button" class="plus btn-number" onclick="updateCart({{ $item->id }})" data-type="plus" data-field="{{ $item->id }}"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                    </td>
                    <td><span class="price">{{number_format($item->price,0,',','.')}} VNĐ</span></td>
                    <td><span class="price {{ $item->id }}">{{number_format($item->price*$item->quantity,0,',','.')}} VNĐ</span></td>
                    <td>
                        <a class="btn btn-success" href="{{route('cart.index')}}"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#centralModalDanger_{{$item->id}}">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
                <div class="modal fade" id="centralModalDanger_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-notify modal-warning" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                                <p class="heading lead">Thông Báo</p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">
                                <div class="text-center">
                                    <i class="fa fa-trash-o fa-4x mb-3 text-danger animated rotateIn"></i>
                                    <p>Bạn có muốn xóa sản phẩm khỏi giỏ hàng không ?</p>
                                </div>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                                <button class="btn btn-danger" type="button" onclick="removeCart({{ $item->id }})" data-dismiss="modal">Xóa</button>
                                <a type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Hủy Bỏ</a>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                @endforeach
            </table>
            <!--<div class="row">
                <div class="ml-3">
                    <h3>Tổng số sản phẩm bạn đã mua là : {{Cart::getToTalQuantity()}}</h3>
                </div>
            </div>-->
            <div class="row">
                <div class="ml-3 py-3">
                    <h3 id="totalPrice">Tổng tiền là : {{number_format(Cart::getSubTotal(),0,',','.')}} VNĐ</h3>
                </div>
            </div>
            <div class="row  justify-content-center" id="total-price">

                <a href="{{asset('/checkout')}}" class="btn btn-success btn-lg mr-2">Thanh Toán</a>

                <a href="{{'/'}}" class="btn btn-lg bg-primary text-white">Mua tiếp</a>

            </div>

        </form>
    </div>

    <div>
    </div>

</div>

@endsection @push('scripts')
<script src="{{ URL::to('front-end/jsWebsite/cart.js') }}"></script>
@endpush
