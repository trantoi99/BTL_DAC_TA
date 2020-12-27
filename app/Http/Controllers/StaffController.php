<?php

namespace App\Http\Controllers;

use App\Http\Requests\NhanVienRequest;
use App\nhan_vien;
use Exception;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function insert(NhanVienRequest $request)
    {
        try{
            if($request->ajax())
            {
                $staff = nhan_vien::where('Ten_Nv', '=', $request->Ten_Nv)->first();
                if(!is_null($staff))
                {
                    return $this->respondWithError("Bản ghi đã tồn tại.");
                }

                nhan_vien::create($request->getAttributes());

                return $this->respondWithSuccess("Thêm mới thành công.");
            }
        }
        catch(Exception $ex){
            return $this->respondWithError("Lỗi xảy ra khi thực hiện.");
        }
    }

    public function update(NhanVienRequest $request)
    {
        try{
            if($request->ajax())
            {
                $staff = nhan_vien::find($request->Id_Nv);
                if(is_null($staff))
                {
                    return $this->respondWithError("Không tìm thấy bản ghi.");
                }

                $staff->update($request->getAttributes());
                return $this->respondWithSuccess("Cập nhật thành công.");

            }
        }
        catch(Exception $ex){
            return $this->respondWithError("Lỗi xảy ra khi thực hiện.");
        }
    }

    public function delete($id)
    {
        try{
            $staff = nhan_vien::find($id);
            if(!is_null($staff))
            {
                $staff->delete();
                return $this->respondWithSuccess("Xóa thành công.");
            }
            else{
                return $this->respondWithError("Không tìm thấy bản ghi.");
            }
        }
        catch(Exception $ex)
        {
            return $this->respondWithError("Lỗi xảy ra khi thực hiện.");
        }
    }

    public function show($id)
    {
        try{
            $staff = nhan_vien::find($id);
            return $this->respond($staff);
        }
        catch(Exception $ex)
        {
            return $this->respondWithError("Lỗi xảy ra khi thực hiện.");
        }
    }
}
