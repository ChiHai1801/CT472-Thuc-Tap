<?php

namespace App\Http\Controllers\nurse;

use Illuminate\Http\Request;
use App\Models\Phieukham;
use Illuminate\Support\Facades\Auth;

class LapPhieuKhamBenh extends phieukham
{
    public $data = [];
    private $users;

    public function __construct(){
        $this->users = new Phieukham();
    }

    public function index(Request $request){

        $this->data['title'] = 'Danh sách lập phiếu khám bệnh';
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

            $userList = $this->users->getAllTable($filters, $keywords);  // getAllTable là gọi từ trong Model\Phieukham qua để xử lý thông tin
            $phantrang = $this->users->phantrang();         // phantrang là gọi từ trong Model\Phieukham qua để xử lý thông tin
        
        return view('nurse.function.lapphieu.lapPhieuKhamBenh', $this->data, compact('userList', 'phantrang'));
    }
    

    // Dùng để chuyển thông tin bệnh nhân qua phiếu khám để hiển thị và xử lý lập phiếu
    public function getEdit($id=0){
        $this->data['title'] = 'Lập phiếu khám';

        if(!empty($id)){
            $userDetail = $this->users->getDetailPhieukham($id);    // getDetailPhieukham là gọi từ trong Model\Phieukham qua để xử lý thông tin
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
            }
        }
        return view('nurse.function.lapphieu.lapphieu', $this->data, compact('userDetail'));
    }

  
    // Dùng để chuyển thông tin bệnh nhân qua xem phiếu khám để hiển thị thông tin sau khi lập phiếu
    public function getEditXPK($id=0){
        $this->data['title'] = 'Xem phiếu khám';

        if(!empty($id)){
            $userDetail = $this->users->getDetailInPK($id); // getDetailInPK là gọi từ trong Model\Phieukham qua để xử lý thông tin
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
            }
        }
        $userDetailYT = Auth::user();

        return view('nurse.function.lapphieu.xemlapphieu', $this->data, compact('userDetail', 'userDetailYT'));
    }


        // Dùng để chuyển thông tin bệnh nhân qua in phiếu khám để hiển thị thông tin và in phiếu
    public function getEditInPK($id=0){
        $this->data['title'] = 'In phiếu khám';

        if(!empty($id)){
            $userDetail = $this->users->getDetailInPK($id); // getDetailInPK là gọi từ trong Model\Phieukham qua để xử lý thông tin
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
            }
        }
        $userDetailYT = Auth::user();

        return view('nurse.function.infile.inphieukham', $this->data, compact('userDetail', 'userDetailYT'));
    }


    // hiển thị giao diện lập phiếu
    public function add(){
        $this->data['title'] = 'Lập phiếu khám';
        return view('nurse.function.lapphieu.lapphieu', $this->data);
    }


    // Dùng để lưu thông tin bệnh nhân sau khi lập phiếu
    public function postAdd(Request $request, $id){

         // Hiển thị các thông báo lỗi
        $request->validate([
            'id_patient' => 'required|unique:benhs',
            'ngaylap' => 'required',
            'trieuchung' => 'required '
        ], [
            'id_patient.required' => 'Thông tin đã được lưu và in trong hôm nay',
            'id_patient.unique' => 'Thông tin đã được lưu và in trong hôm nay',
            'ngaylap.required' => 'Ngày lập bắt buộc phải nhập',
            'trieuchung.required' => 'Triệu chứng bắt buộc phải nhập'
        ]);

        $dataInsert = [
        $request->input('id_patient'),
        $request->input('trieuchung'),
        $request->input('departement'),
        $request->input('ngaylap')
        
        ];

        $this->users->addPhieu($dataInsert);        // addPhieu là gọi từ trong Model\Phieukham qua để xử lý thông tin
         return redirect()->route('lapphieu/edit-xpk', $id);
    }

  

}
