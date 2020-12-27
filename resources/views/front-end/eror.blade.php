@extends('front-end.master') @section('title','Error Page') @section('main')
    <div class="wrap-inner">
        <div class="alert alert-warning alert-dismissible fade show mt-4" style="font-size:24px;">
            <strong>Thông báo!</strong> Bạn chưa đặt hàng vui lòng quay lại <a href="{{asset('/')}}"> trang chủ </a> để mua hàng.
        </div>
    </div>
@stop()
