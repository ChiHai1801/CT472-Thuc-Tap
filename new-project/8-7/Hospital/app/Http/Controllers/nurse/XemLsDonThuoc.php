<?php

namespace App\Http\Controllers\nurse;

use Illuminate\Http\Request;
use App\Models\Xemthuoc;

class XemLsDonThuoc extends xemthuoc
{
    public $data = [];
    private $users;

    public function __construct(){
        $this->users = new Xemthuoc();
    }

    public function index(Request $request){
        $this->data['title'] = 'Danh sách lịch sử đơn thuốc';

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


        $userList = $this->users->getAllTable($filters, $keywords); // getAllTable là gọi từ trong Model\Xemthuoc qua để xử lý thông tin
        $phantrang = $this->users->phantrang();             // phantrang là gọi từ trong Model\Xemthuoc qua để xử lý thông tin

        return view('nurse.function.donthuoc.xemlsdonthuoc', $this->data, compact('userList', 'phantrang'));

    }


    // Dùng để chuyển thông tin bệnh nhân đã được lập đơn thuốc qua đơn thốc để hiển thị
    public function getEditCT($id=0){
        $this->data['title'] = 'Xem lịch sử đơn thốc';

        if(!empty($id)){
            $userDetail = $this->users->getDetail($id); // getDetail là gọi từ trong Model\Xemthuoc qua để xử lý thông tin
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
            }
        }
        $DSthuocs = $this->users->DSthuoc($id);     // DSthuoc là gọi từ trong Model\Xemthuoc qua để xử lý thông tin
        return view('nurse.function.donthuoc.chitietdonthuoc', $this->data, compact('userDetail', 'DSthuocs'));
    }


    // Dùng để chuyển thông tin bệnh nhân đã được lập đơn thuốc qua đơn thốc để in
    public function getEditInDT($id=0){
        $this->data['title'] = 'In đơn thuốc';

        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);   // getDetail là gọi từ trong Model\Xemthuoc qua để xử lý thông tin
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
            }
        }
        $DSthuocs = $this->users->DSthuoc($id);     // DSthuoc là gọi từ trong Model\Xemthuoc qua để xử lý thông tin
        return view('nurse.function.infile.indonthuoc', $this->data, compact('userDetail' , 'DSthuocs'));
    }

}
