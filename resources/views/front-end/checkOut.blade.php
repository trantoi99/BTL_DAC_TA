@extends('front-end.master') @section('title','Checkout Page') @section('main')

<link rel="stylesheet" href="css/checkout.css">

<div id="wrap-inner">
    <div id="xac-nhan">
        <div class="row py-3 mb-3 bg-primary text-white mt-3 py-2 px-2 ml-0">
            <h3 class="text-white">Xác Nhận Mua Hàng</h3>
        </div>
        <form id="form-input" onsubmit="return false">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email address:</label>
                <input required type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="name">Họ và tên:</label>
                <input required type="text" class="form-control" id="tenKH" name="tenKH">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input required type="number" class="form-control" id="sodienthoai" name="sodienthoai">
            </div>
            <div class="form-group">
                <label for="add">Địa chỉ:</label>
                <input required type="text" class="form-control" id="diachi" name="diachi">
            </div>
            <div class="form-group text-right">
                <button type="submit" id="save" class="btn btn-success">Thực hiện đơn hàng</button>
            </div>
        </form>
    </div>
</div>


@endsection @push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $("#save").on('click', function() {
            var form_data = $("#form-input").serialize();
            $.ajax({
                method: 'POST',
                url: '/cart/save',
                data: form_data,
                dataType: 'json',
                success: function(msg) {
                    if (msg.success) {
                        alert(msg.message);
                        setTimeout(function() {
                            window.location.href = "/complete";
                        }, 1500);
                    } else {
                        alert(msg.message);
                    }
                },
                error: function(error) {
                    alert(error.message);
                }
            })
        })
    });
</script>
@endpush
