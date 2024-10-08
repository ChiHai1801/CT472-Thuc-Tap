<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Yta;
use App\Models\kedon;
use App\Models\Benhnhan;
use App\Models\Bacsi;
use App\Models\Baiviet;

use DB;


class HomeController extends Controller
{
    public $data = [];
    private $yta;
    private $kedon;
    private $blogs;


    public function __construct(){
        $this->yta = new Yta();
        $this->kedon = new kedon();
        $this->benhnhan = new Benhnhan();
        $this->blogs = new Baiviet();

    }

    public function redirect(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == '0') {
                return view('user.home');
            } elseif ($user->usertype == '1') {
               // Lấy số lượng loại thuốc
               $soluonglt = DB::table('thuocs')->count();
               // Lấy số lượng loại thuốc đã được thêm trong ngày hôm nay
               $medicinesAddedToday = DB::table('thuocs')
                   ->whereDate('created_at', today())
                   ->count();

               // Lấy số lượng tài khoản y tá
               $soluongyt = DB::table('users')
                   ->where('usertype', 3)
                   ->count();
               // Lấy số lượng bài viết
               $soluongbv = DB::table('baiviets')->count();
               // Lấy số lượng tài khoản bác sĩ
               $soluongbs = DB::table('users')
                   ->where('usertype', 2)
                   ->count();
               // Lấy số lượng bài viết đã được thêm trong ngày hôm nay
               $postsAddedToday = DB::table('baiviets')
                   ->whereDate('created_at', today())
                   ->count();
               // Lấy số lượng tài khoản bác sĩ đã được thêm trong ngày hôm nay
               $bacsisAddedToday = DB::table('users')
                   ->where('usertype', 3)
                   ->whereDate('created_at', today())
                   ->count();
               // Lấy số lượng tài khoản y tá đã được thêm trong ngày hôm nay
               $ytasAddedToday = DB::table('users')
                   ->where('usertype', 2)
                   ->whereDate('created_at', today())
                   ->count();
               return view('admin.trangchu', compact('soluongyt', 'soluongbv', 'soluongbs', 'soluonglt', 'postsAddedToday', 'bacsisAddedToday', 'ytasAddedToday', 'medicinesAddedToday'));
           
            } elseif ($user->usertype == '2') {
                $this->data['title'] = 'Trang chủ';
                
                $index = $this->kedon->danhsach();
                return view('doctor.doctor', $this->data, compact('index'));
            
            } elseif ($user->usertype == '3') {
                $this->data['title'] = 'Trang Chủ Y Tá';
                
                $filters = [];
                $keywords = null;
                
                    //lọc theo trạng thái bệnh nhân đã được xác nhận hay chưa
                    if(!empty($request->trangthai)){
                        $trangthai = $request->trangthai;
                        if($trangthai == 'xacnhan'){
                            $trangthai = 1;
                        }else{
                            $trangthai = 0;
                        }
        
                        $filters[] = ['benhnhans.trangthai', '=', $trangthai];
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

                $userList = $this->yta->getAllTable($filters,$keywords);
                $phantrang = $this->yta->phantrang();

                return view('nurse.home', $this->data, compact('userList', 'phantrang'));
            }
        }
    
        return redirect()->back();
    }

    // chuyển đổi users thành bệnh nhân
    public function chuyendoi()
    {
        $users = User::where('usertype', '=', 0)->get();
        foreach ($users as $user) {
            $exit_benhnhan = 0;    
            $exit_benhnhan = Benhnhan::where('email_bn', $user->email)->count();
            if($exit_benhnhan==0) {
            $benhnhan = new Benhnhan();
            $benhnhan->name_bn = $user->name;
            $benhnhan->email_bn = $user->email;
            $benhnhan->phone_bn = $user->phone;
            $benhnhan->gender_bn = $user->gender;
            $benhnhan->ngaysinh_bn = $user->ngaysinh;
            $benhnhan->cccd_bn = $user->cccd;
            $benhnhan->address_bn = $user->address;
            $benhnhan->password_bn = $user->password;
            $benhnhan->save();
        }}
        return view('user.home');
    }

    public function index()
    {
        return view('user.home');
    }

    
    public function about()
    {
        return view('user.about');
    }



    public function post($id)
    {
        $post = $this->blogs->getPost($id);
        $post = $post[0];
        return view('user.post', compact('post'));
    }
    


    public function blog(Request $request)
    {
        $keywords = null;
        $filters = [];
        if (!empty($request->keywords)) {
            $keywords = $request->keywords; 
        }
        $postList = $this->blogs->getAllTableBV($keywords);
        $phantrang = $this->blogs->phantrangBV();
        $ttnoibat = $this->blogs->getNoibat();
        return view('user.blog', $this->data, compact('postList', 'phantrang', 'ttnoibat'));
    }


    public function getEditKD($id=0){
        $this->data['title'] = 'Kê đơn thuốc';

        if(!empty($id)){
            $userDetail = $this->kedon->getDetailDS($id);
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
            }
        }
        // dd($userDetail);
        $kedons = $this->kedon->chonthuoc();
        $userDetailBS = Auth::user();
        return view('doctor.bacsi.taodonthuoc', $this->data, compact('userDetail', 'userDetailBS', 'kedons'));
    }


    public function ttbs()
    {
        $this->data['title'] = 'Thông tin bác sĩ';
        $userDetailBS = Auth::user();
        return view('doctor.bacsi.thongtinbacsi', $this->data, compact('userDetailBS'));
     
    }

    public function cnbs(Request $request)
    {
        $this->data['title'] = 'Thông tin bác sĩ';
        $userBS = Auth::user();
        $BS = user::find($userBS->id);
        $BS->update([
            'name' => $request->input('hoten'),
            'phone' => $request->input('sdt'),
            'cccd' => $request->input('cccd'),
            'address' => $request->input('diachi'),
            'password' => bcrypt($request->input('matkhau'))
        ]);

        return redirect('doctor/bacsi/thongtinbacsi');
    }


        // Dùng để chuyển thông tin bệnh nhân đã được xác nhận qua giao diện của bác sĩ
        public function getEditBS($id){ 
            $userDetail = Benhnhan::find($id);
            $userDetail->trangthai = 1;
            $userDetail->save();
            return redirect('home');
            }


   // Dùng để lưu thông tin về (ngày khám, buổi khám vầ triệu chứng) trên giao diện bệnh nhân
   public function postAddBN(Request $request){

    // Hiển thị các thông báo lỗi
    $request->validate([
        'message' => 'required', 
    ], [
        'message.required' => 'Cần điền triệu chứng bạn đang mắc phải. Để chúng tôi có thể hỗ trợ một cách tốt nhất',
    ]);
    $dataInsert = [
        $request->input('message'),
        $request->input('departement'),
        $request->input('lichkham')

    ];

    // dd($dataInsert);
    $this->benhnhan->addDanhsach($dataInsert); // addDanhsach là gọi từ trong Model\Danhsach qua để xử lý thông tin
    return view('user.home')->with('Đăng ký khám thành công');
}
        
 

}
