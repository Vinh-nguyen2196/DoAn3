<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Slide;
use App\product;
use Illuminate\Support\Facades\Input;
use Hash;
use Log;
use App\Productype;
use Auth;
use DB;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
	public function getIndex(){
		$slide=Slide::all();
		$sanpham_hientang= DB::table('products')->select('products.id','name','id_type','description','unit_price','state','image','full_name','address')->join("users", "users.id","=","products.id_user")->where('state','tặng')->orderBy('products.created_at', 'desc')->paginate(8);
		$new_product = DB::table('products')->join("users", "users.id","=","products.id_user")->orderBy('products.created_at', 'desc')->paginate(8);
        echo $sanpham_hientang;
		Log::debug("========== : ".$new_product);

		
		return view('page.trangchu',compact('slide','new_product','sanpham_hientang'));
	}
	public function getLoaiSP($type){
		$sp_theoloai = product::where('id_type',$type)->get();
		$new_product =DB::table('products')->select('products.id','name','id_type','description','unit_price','state','image','full_name','address')->join("users", "users.id","=","products.id_user")->where('id_type',$type)->orderBy('products.created_at', 'desc')->paginate(4);

		return view('page.loai-sanpham',compact('sp_theoloai','new_product'));
	}
    //
    public function getChitiet(Request $req){
    	$sanpham = product::where('id', $req->id)->first();
    	$new_product =DB::table('products')->select('products.id','name','id_type','description','unit_price','state','image','full_name','address')->join("users", "users.id","=","products.id_user")->where('state','tặng')->orderBy('products.created_at', 'desc')->paginate(8);
    	return view('page.chitiet-sanpham',compact('sanpham','new_product'));
    }
    public function getLogin(){

    	return view('page.dangnhap');
    }
    public function getSigin(){

    	return view('page.dangky');
    }
     public function postSigin(Request $req){
     	$this->validate($req,
     		[
               'email'=>'required|email|unique:users,email',
               'password'=>'required|min:6|max:20',
               'fullname'=> 'required',
               're_password'=>'required|same:password'


     		],
     		[
     			'email.required'=>'vui lòng nhập email',
     			'email.email'=>'không đúng định dạng email',
     			'email.unique'=>'email đã có người sử dụng',
     			'password.required'=>'vui lòng nhập mật khẩu',
     			're_password.same'=>'mật khẩu không giống nhau',
     			'password.min'=>'mật khẩu it nhất 6 kí tự'



     		]


     	);
     	$user = new User();
     	$user->full_name=$req->fullname;
     	$user->email=$req->email;
     	$user->password = Hash::make($req->password);
     	$user->phone=$req->phone;
     	$user->address=$req->address;
     	$user->save();
     	return redirect()->back()->with('thanhcong','tạo tài khoản thành công');


    }

     public function postLogin(Request $req){
     	$this->validate($req,
     		[
               // 'email'=>'required|email|unique:users,email',
               // 'password'=>'required|min:6|max:20',
     		],
     		[
     			// 'email.required'=>'vui lòng nhập email',
     			// 'email.email'=>'không đúng định dạng email',
     			// 'email.unique'=>'email đã có người sử dụng',
     			// 'password.required'=>'vui lòng nhập mật khẩu',
     		]
     	);

     	$email = $req->email;
     	$password = $req->password;
     	$data = array('email'=>$email, 'password'=>$password);
     	if(Auth::attempt($data)){
     		$slide=Slide::all();
		$sanpham_hientang=DB::table('products')->select('products.id','name','id_type','description','unit_price','state','image','full_name','address')->join("users", "users.id","=","products.id_user")->where('state','tặng')->orderBy('products.created_at', 'desc')->paginate(8);
		$new_product = DB::table('products')->join("users", "users.id","=","products.id_user")->orderBy('products.created_at', 'desc')->paginate(8);
		Log::debug("========== : ".$new_product);
		
		return view('page.trangchu',compact('slide','new_product','sanpham_hientang'));
     	}else{
     		return redirect()->back()->with('error', 'Có lỗi xảy ra');
     	}


    }

    public function postLogout(){
    	Auth::logout();
    	return view('page.dangnhap');
    }

    public function getAddPost( ){

    	
    	$Productype=Productype::get();
    
    	return view('page.post',compact('Productype'));
  

}
	public function savePost(Request $req){
		// điền những thông tin cần lấy ra đây, rồi save vào db 
			$this->validate($req,
     		[
                'nameproduct'=>'required',
                'pic'=>'required',
                'theloai'=>'required',
                'state'=>'required',
     		],
     		[
     			 'nameproduct.required'=>'vui lòng nhập email',
     			  'pic.required'=>'vui lòng chọn ảnh',
     			   'theloai.required'=>'vui lòng chọn thể loại',
     			    'state.required'=>'vui lòng chọn trạng thái',
     			 
     		]
     	);

		 $image = $req->file('pic'); 
		
		 	$imagename=$image->getClientOriginalName();
		 	$image->move('source/image/product/',$imagename);

		
		 //product::create($input);

	
		
		
        $nameproduct = $req->input('nameproduct');
		//$type        = $req->theloai;//thể loại chưa get từ server về
		$description   = $req->description;
		//$pic          = $req->pic;//ảnh
		//$state       = $req->state;

		// viết rồi lưu vào db 
		$product = new product();
		
		$product->id_user= Auth::user()->id;
		
		$product->id_type= $req->theloai;
		
		

		$product->name=$nameproduct;
		//$product->id_type=$type;
		$product->description=$description;
		$product->state = $req->state;

		$product->image   = "$imagename";
		//$product->state=$state;
		$product->save();

		return redirect()->back()->with('status','Đăng thành công');




	}

public function getSearch(Request $req){
	$new_product =DB::table('products')->select('products.id','name','id_type','description','unit_price','state','image','full_name','address')->join("users", "users.id","=","products.id_user")->where('name','like','%'.$req->key.'%')
							->orWhere('unit_price',$req->key)
							->orderBy('products.created_at', 'desc')->paginate(8);
		$product =  product::where('name','like','%'.$req->key.'%')
							->orWhere('unit_price',$req->key)
							->get();
				return view('page.search',compact('new_product'));

}
 public function getTang(Request $req){
 		$sanpham_hientang=product::where('state','Tặng')->paginate(8);
 		return view('page.tang',compact('sanpham_hientang'));

 }
  public function getTraodoi(Request $req){
 		$sanpham_hientang=product::where('state','Trao đổi')->paginate(8);
 		return view('page.traodoi',compact('sanpham_hientang'));

 }
  public function getThue(Request $req){
 		$sanpham_hientang=product::where('state','Cho thuê')->paginate(8);
 		return view('page.thue',compact('sanpham_hientang'));

 }
  public function getThoathuan(Request $req){
 		$sanpham_hientang=product::where('state','Thỏa thuận')->paginate(8);
 		return view('page.thoathuan',compact('sanpham_hientang'));


 }
 public function getMuon(Request $req){
 		$sanpham_hientang=product::where('state','Mượn')->paginate(8);
 		return view('page.chomuon',compact('sanpham_hientang'));

 }

   
}
	