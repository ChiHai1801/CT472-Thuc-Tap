<?php

namespace App\Http\Controllers\nurse;

use Illuminate\Http\Request;
use App\Models\Chiphikham;
use App\Models\Bacsi;
use Illuminate\Support\Facades\Auth;

use DB;

class ThuPhi extends chiphikham
{
    public $data = [];
    private $users;

    public function __construct(){
        $this->users = new Chiphikham();
    }

    public function index(Request $request)
    {
        $this->data['title'] = 'Danh sách thu phí';

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

        $userList = $this->users->getAllTable($filters, $keywords);     // getAllTable là gọi từ trong Model\Chiphikham qua để xử lý thông tin
        $phantrang = $this->users->phantrang();         // phantrang là gọi từ trong Model\Chiphikham qua để xử lý thông tin
        return view('nurse.function.phieuthu.phieuthu', $this->data, compact('userList', 'phantrang'));
    }


    
    // Dùng để chuyển thông tin bệnh nhân đã được khám xong qua phiếu khám bảo hiểm để hiển thị
    public function getEditBHYT($id=0){
        $this->data['title'] = 'Phiếu thu bảo hiểm y tế';

        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);      // getDetail là gọi từ trong Model\Chiphikham qua để xử lý thông tin
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
            }
        }
        $userDetailYT = Auth::user();
        $DSthuphis = $this->users->DSthuphi($id);       // DSthuphi là gọi từ trong Model\Chiphikham qua để xử lý thông tin
        return view('nurse.function.phieuthu.xemphieuthu', $this->data, compact('userDetail', 'DSthuphis', 'userDetailYT'));
    }


     // Dùng để chuyển thông tin bệnh nhân đã được khám xong qua phiếu khám dịch vụ để hiển thị
    public function getEditDV($id=0){
        $this->data['title'] = 'Phiếu thu dịch vụ';

        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);     // getDetail là gọi từ trong Model\Chiphikham qua để xử lý thông tin
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
            }
        }
        $userDetailYT = Auth::user();

        $DSthuphis = $this->users->DSthuphi($id);       // DSthuphi là gọi từ trong Model\Chiphikham qua để xử lý thông tin
        return view('nurse.function.phieuthu.xemphieuthudv', $this->data, compact('userDetail', 'DSthuphis', 'userDetailYT'));
    }


    // Dùng để chuyển thông tin bệnh nhân đã được khám xong qua phiếu khám bảo hiểm để hiển thị và in
    public function getEditInBH($id=0){
        $this->data['title'] = 'In phiếu thu bảo hiểm y tế';

        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);     // getDetail là gọi từ trong Model\Chiphikham qua để xử lý thông tin
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
            }
        }
        $userDetailYT = Auth::user();

        $DSthuphis = $this->users->DSthuphi($id);       // DSthuphi là gọi từ trong Model\Chiphikham qua để xử lý thông tin
        return view('nurse.function.infile.inphieuthu', $this->data, compact('userDetail', 'DSthuphis', 'userDetailYT'));
    }


        // Dùng để chuyển thông tin bệnh nhân đã được khám xong qua phiếu khám dịch vụ để hiển thị và in
    public function getEditInDV($id=0){
        $this->data['title'] = 'In phiếu thu dịch vụ';

        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);     // getDetail là gọi từ trong Model\Chiphikham qua để xử lý thông tin
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
            }
        }
        $userDetailYT = Auth::user();

        $DSthuphis = $this->users->DSthuphi($id);        // DSthuphi là gọi từ trong Model\Chiphikham qua để xử lý thông tin
        return view('nurse.function.infile.inphieuthudv', $this->data, compact('userDetail', 'DSthuphis', 'userDetailYT'));
    }
}
