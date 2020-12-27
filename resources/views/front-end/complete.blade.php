@extends('front-end.master')
@section('title','Thank you')
@section('main')
<link rel="stylesheet" href="css/complete.css">
                    <div id="wrap-inner ">
                        <div id="complete">
                            <p class="info">Quý khách đã đặt hàng thành công!</p>
                            <p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng Tôi</p>
                            <p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.</p>
                            <p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
                            <p>• Trụ sở chính : Số 3 Cầu Giấy - Phường Láng Thượng - Quận Đống Đa - Hà Nội</p>
                            <p>Cám ơn Quý khách đã mua hàng của trang web chúng tôi !</p>
                        </div>
                        <div class="mr-auto mt-3 text-right">
                            <a class="btn btn-danger btn-lg" href="{{asset('/')}}">Quay lại trang chủ</a>
                        </div>
                    </div>
@stop()
