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
            $staff = nhan_vien::where('Ten_Nv', '=', $request->Ten_Nv)->firstOrFail();
            if(!is_null($staff))
            {
                return $this->respondWithError("Bản ghi đã tồn tại.");
            }

            $model = $request->getAttributes();

            nhan_vien::create($model);

            return $this->respondWithSuccess("Thêm mới thành công.");
        }
        catch(Exception $ex){
            return $ex->getMessage();
        }
    }

    public function update(NhanVienRequest $request)
    {
        try{
            $id = $request->Id_Nv;
            $staff = nhan_vien::where("Id_Nv", "=", $id)->firstOrFail();

            if(is_null($staff))
            {
                return $this->respondWithError("Không tìm thấy bản ghi.");
            }

            $staff->update($request->getAttributes());
            return $this->respondWithSuccess("Cập nhật thành công.");

        }
        catch(Exception $ex){
            return $this->respondWithError("Lỗi xảy ra khi thực hiện.");
        }
    }

    public function delete($id)
    {
        try{
            $staff = nhan_vien::where("Id_Nv", "=", $id)->firstOrFail();

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
            return $ex->getMessage();
        }
    }

    public function show($id)
    {
        try{
            $staff = nhan_vien::where("Id_Nv", "=", $id)->firstOrFail();
            return $this->respond($staff);
        }
        catch(Exception $ex)
        {
            return $this->respondWithError("Lỗi xảy ra khi thực hiện.");
        }
    }
}
