@extends('admin.masterPageAdmin')
@section('main')
 <!-- Page Heading -->
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Nhân viên</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="#" data-action="add" class="btn btn-primary" data-toggle="modal" data-target="#Modal">
            Thêm mới
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Tuổi</th>
                        <th>Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Ca lam viec</th>
                        <th>Lương</th>
                        <th>Xử lý</th>
                        </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm mới nhân viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form id="form-input">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="staffName">Tên</label>
                    <input type="text" class="form-control" id="ten" name="Ten_Nv" placeholder="Tên nhân viên">
                </div>
                <div class="form-group">
                    <label for="staffAge">Tuoi</label>
                    <input type="text" class="form-control" id="tuoi" name="Tuoi" placeholder="Tuổi">
                </div>
                <div class="form-group">
                    <label for="staffSex">Giới tính</label>
                    <select class="form-control" name="Gioi_Tinh" id="gioitinh">
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="staffPhoneNumber">Số điện thoại</label>
                    <input type="text" class="form-control" name="SDT" id="sdr" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <label for="staffCa">Ca làm việc</label>
                    <select class="form-control" name="Ca_lam_viec" id="ca">
                        <option value="1">Ca 1</option>
                        <option value="2">Ca 2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="staffSalary">Lương</label>
                    <select class="form-control" name="Luong" id="luong" placeholder="Lương">
                        <option value="1000000">Nhân viên văn phòng - 1 triệu</option>
                        <option value="20000000">Giám đốc - 20 triệu</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
            <button type="button" data-id="" id="save" class="btn btn-primary">Lưu</button>
        </div>
    </div>
  </div>
</div>

@stop()
@push("scripts")
<script src="{{ URL::to('admin/js/staff.js') }}"></script>
@endpush
