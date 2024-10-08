<?php

namespace App\Http\Controllers\nurse;

use Illuminate\Http\Request;
use App\Models\Hoadon;

class LapHoaDon extends hoadon
{
    public $data = [];
    private $users;

    public function __construct(){
        $this->users = new Hoadon();
    }

    public function index(Request $request){

        $this->data['title'] = 'Danh sách lập hóa đơn';

        $filters = [];
        $keywords = null;

            //lọc theo dịch vụ khám
            if(!empty($request->status)){
                $status = $request->status;
                if($status == 'Dichvu'){
                    $status = 0;
                }else{
                    $status = 1;
                }
                $filters[] = ['benhnhans.examination_service', '=', $status];
            }

               // lọc theo giới tính
               if(!empty($request->gioitinh)){
                $gioitinh = $request->gioitinh;
                if($gioitinh == 'Nam'){
                    $gioitinh = 'Nam';
                }else{
                    $gioitinh = "Nữ";
                }
    
                $filters[] = ['benhnhans.gender_bn', '=', $gioitinh];
            }
        
            if(!empty($request->keywords)){
                $keywords = $request->keywords;     // Dùng để tìm kiếm thông qua họ tên, email và số điện thoại
            }

            $userList = $this->users->getAllTable($filters,$keywords);      // getAllTable là gọi từ trong Model\Hoadon qua để xử lý thông tin
            $phantrang = $this->users->phantrang();     // phantrang là gọi từ trong Model\Hoadon qua để xử lý thông tin
        
        return view('nurse.function.hoadon.laphoadon', $this->data, compact('userList', 'phantrang'));
    }


     // Dùng để chuyển thông tin bệnh nhân giao diện hóa đơn
     public function getEditHD($id=0){
        $this->data['title'] = 'Lập hóa đơn';

        if(!empty($id)){
            $userDetail = $this->users->getDetailHD($id);   // getDetailDS là gọi từ trong Model\Hoadon qua để xử lý thông tin
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
            }
        }
        
        return view('nurse.function.hoadon.chitiethoadon', $this->data, compact('userDetail'));
    }
    
}
