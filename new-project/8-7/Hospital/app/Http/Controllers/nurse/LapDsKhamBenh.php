<?php

namespace App\Http\Controllers\nurse;

use Illuminate\Http\Request;
use App\Models\Danhsach;
use App\Models\User;


class LapDsKhamBenh extends danhsach
{
    public $data = []; 
    private $users;

    public function __construct(){
        $this->users = new Danhsach();
        
    }

    public function index(Request $request){
        $this->data['title'] = 'Danh sách khám bệnh';

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


              // lọc theo trang thái
              if(!empty($request->trangthai)){
                $trangthai = $request->trangthai;
                if($trangthai == 'choxacnhan'){
                    $trangthai = '0';
                }elseif($trangthai == 'chokham'){
                    $trangthai = "1";
                }else{
                    $trangthai = "2";
                }
    
                $filters[] = ['benhnhans.trangthai', '=', $trangthai];
            }
            
            // lọc theo ngày (chưa lọc được theo ngày giờ)
            if(!empty($request->ngay)){
                $ngay = $request->ngay;
    
                $filters[] = ['benhnhans.created_at', '=', $ngay];
            }
        
            if(!empty($request->keywords)){
                $keywords = $request->keywords;     // Dùng để tìm kiếm thông qua họ tên, email và số điện thoại
            }

            $userList = $this->users->getAllTable($filters,$keywords); // getAllTable là gọi từ trong Model\Danhsach qua để xử lý thông tin
            $phantrang = $this->users->phantrang();     // phantrang là gọi từ trong Model\Danhsach qua để xử lý thông tin
            
        return view('nurse.function.danhsach.lapdskhambenh', $this->data, compact( 'userList', 'phantrang'));
    }


    // hiển thị giao diện thêm bệnh nhân
    public function add(){
        $this->data['title'] = 'Thêm thông tin bệnh nhân';
        return view('nurse.function.danhsach.add', $this->data);
    }


    // Dùng để lưu thông tin bệnh nhân
    public function postAddDS(Request $request){

        //Hiển thị các thông báo lỗi
        $request->validate([
            'hoten' => 'required|min:5',
            'email' => 'required|email',
            'sdt' => 'required|min:10|max:10',
            'cccd' => 'min:12|max:12',
            'gioitinh' => 'required',
            'Dichvu' => 'required',
            // 'ngay' => 'required'
        ], [
            'hoten.required' => 'Họ và tên bắt buộc phải nhập',
            'hoten.min' => 'Họ và tên phải :min ký tự trơ lên',

            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không đúng định dạng',
            // 'email.unique' => 'Email đã được người khác sử dụng',

            'sdt.required' => 'Số điện thoại bắt buộc phải nhập',
            'sdt.min' => 'Số điện thoại phải đủ :min số',
            'sdt.max' => 'Số điện thoại này đã vượt quá :max số cho phép',

            'cccd.min' => 'Nhập đủ :min số của CCCD',
            'cccd.max' => 'Nhập quá :max số của CCCD',

            'gioitinh.required' => 'Click chọn giới tính tương ứng',
            'Dichvu.required' => 'Click chọn dịch vụ theo yêu cầu của bệnh nhân',
            // 'ngay.required' => 'Ngày khám bắt buộc phải nhập'
        ]);
        
        
        $dataInsert = [
            $request->input('hoten'),
            $request->input('email'),
            $request->input('sdt'),
            $request->input('diachi'),
            $request->input('cccd'),
            $request->input('gioitinh'),
            $request->input('ngsinh'),
            $request->input('Dichvu'),
            $request->input('pass'),
            $request->input('ngay')
        ];

        // dd( $dataInsert);
        $this->users->addDanhsach($dataInsert); // addDanhsach là gọi từ trong Model\Danhsach qua để xử lý thông tin
        return redirect()->route('function/danhsach/lapdskhambenh');
    }


    // Dùng để chuyển thông tin bệnh nhân qua form sửa để hiển thị và update
    public function getEditDS($id=0){
        $this->data['title'] = 'Cập nhật thông tin bệnh nhân';

        if(!empty($id)){
            $userDetail = $this->users->getDetailDS($id);   // getDetailDS là gọi từ trong Model\Danhsach qua để xử lý thông tin
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
            }
        }
        return view('nurse.function.danhsach.edit', $this->data, compact('userDetail'));
    }



    // Update thông tin bệnh nhân
    public function postEditDS(Request $request, $id=0){

         // Hiển thị các thông báo lỗi
        // $request->validate([
        //     'ngay' => 'required'
        // ], [
        //     'ngay.required' => 'Ngày cập nhật buộc phải nhập'
        // ]);

        $dataUpdate = [
            $request->input('hoten'),
            $request->input('email'),
            $request->input('sdt'),
            $request->input('diachi'),
            $request->input('cccd'),
            $request->input('gioitinh'),
            $request->input('ngsinh'),
            $request->input('Dichvu'),
            $request->input('pass'),
            $request->input('ngay')
        ];

        $this->users->uploadDS($dataUpdate, $id); // uploadDS là gọi từ trong Model\Danhsach qua để xử lý thông tin
        return redirect()->route('function/danhsach/lapdskhambenh');
    }


    // Delete thông tin bệnh nhân
    public function delete($id=0){
        
        if(!empty($id)){
            $userDetail = $this->users->getDetailDS($id);   // getDetailDS là gọi từ trong Model\Danhsach qua để xử lý thông tin
            if(!empty($userDetail[0])){
              $deleteStatus =  $this->users->DeleteUser($id);   // DeleteUser là gọi từ trong Model\Danhsach qua để xử lý thông tin
              if($deleteStatus){
                $msg = 'Xóa thông tin bệnh nhân thành công';
              }else{
                $msg = 'Bạn không thể xóa thông tin bệnh nhân lúc này. Vui lòng thử lại sau';
              }
            }else{
                $msg = 'Không tồn tại';
            }
        }else{
            $msg = 'Liên kết không tồn tại';
        }

        return redirect()->route('function/danhsach/lapdskhambenh')->with('msg', $msg);
    }
}
