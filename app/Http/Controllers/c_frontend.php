<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\themes;
use App\category;
use App\menu;
use App\setting;
use App\articles;
use App\home;
use App\slider;
use App\images;
use App\district;
use App\mausac;
use App\size;
use App\messages;
use Mail;
use Auth;

class c_frontend extends Controller
{
    function __construct()
    {
        $head_logo = themes::where('note','logo')->first();
        $head_logo_trang = themes::where('note','logo ân bản')->first();
        $head_setting = setting::where('id',1)->first();
        $cat_pro = menu::where('classify','Product menu')->where('status','true')->where('parent', 0)->orderBy('view','asc')->get();
        $menu = menu::where('classify','Main menu')->where('status','true')->where('parent', 0)->orderBy('view','asc')->get();
        
        view()->share( [
            'head_logo'=>$head_logo,
            'head_logo_trang'=>$head_logo_trang,
            'head_setting'=>$head_setting,
            'cat_pro'=>$cat_pro,
            'menu'=>$menu,
        ]);
    }

    public function home()
    {
        $active = '';
        $slider = themes::where('note','Slider')->get();
        $articles = articles::where('sort_by','2')->where('status','true')->orderBy('id','desc')->paginate(9);
        return view('pages.home',[
            'active'=>$active,
            'slider'=>$slider,
            'articles' => $articles,
        ]);
    }

    public function sitemap()
    {
        $sitemap_category = category::where('status','true')->get();
        $sitemap_articles = articles::where('status','true')->get();
        return response()->view('pages.sitemap', [
            'sitemap_category' => $sitemap_category,
            'sitemap_articles' => $sitemap_articles,
            ])->header('Content-Type', 'text/xml');
    }

    

    public function category($curl)
    {
        $active = $curl;
        $category = category::where('slug',$curl)->first();
        if ($curl=='gioi-thieu') { $active = 'gioi-thieu'; return view('pages.about',['category'=>$category, 'active'=>$active]); }
        if ($curl=='lien-he') { $active = 'lien-he'; return view('pages.contact',['category'=>$category, 'active'=>$active]); }
        
        $cates = category::where('parent', $category["id"])->get();
        $cat_array = [$category["id"]];
        $cat_sku_array = [$category["sku"]];
        foreach ($cates as $cate) {
            $cat_array[] = $cate->id;
            $cat_sku_array[] = $cate->sku;
            $cate1s = category::where('parent', $cate->id)->get();
            foreach ($cate1s as $cate1) {
                $cat_array[] = $cate1->id;
                $cat_sku_array[] = $cate1->sku;
            }
        }

        if ($category['sort_by'] == 1) {
            $id_pro_array = [];
            foreach($cat_array as $key => $cat_id){
                $articles = articles::where('category_id', $cat_id)->orwhere('category_sku','like',"%$cat_sku_array[$key]%")->get();
                foreach($articles as $article){
                    $id_pro_array[] = $article->id;
                }
            }
            $new_id_pro_array = array_unique($id_pro_array);
            // dd($new_id_pro_array);
            $articles = articles::where('status','true')->whereIn('id',$new_id_pro_array)->orderBy('id','desc')->paginate(24);
            return view('pages.product',['category'=>$category, 'product'=>$articles, 'active'=>$active]);
        }

        if ($category['sort_by'] == 2) {
            $articles = articles::where('status','true')->whereIn('category_id',$cat_array)->orderBy('id','desc')->paginate(15);
            return view('pages.news',['category'=>$category, 'articles'=>$articles, 'active'=>$active]);
        }

        if ($category['sort_by'] == 3) {
            return view('pages.singlepage',['category'=>$category, 'active'=>$active]);
        }
        
    }

    public function articles($curl,$arurl)
    {
        $articles = articles::where('slug',$arurl)->first();
        
        $id = $articles['id'];
        // $articles->hits = $articles['hits'] + 1;
        // $articles->save();

        $lienquan = articles::where('status','true')
            ->where('category_id',$articles['category_id'])
            ->whereNotin('id',[$id])
            ->take(8)
            ->get();
        if ($articles['sort_by'] == 1) {
            return view('pages.articles_product',['articles'=>$articles,'lienquan'=>$lienquan]);
        }
        if ($articles['sort_by'] == 2) {
            return view('pages.articles',['articles'=>$articles,'lienquan'=>$lienquan]);
        }
    }

    public function post_search(Request $Request)
    {
        $articles = articles::orderBy('id','desc')->where('id','!=' , 0);
        if($Request->mebe){
            $articles->where('category_sku','like',"%$Request->mebe%");
        }
        // if($Request->mebe){
        //     $articles->where('name','like',"%$Request->name%");
        // }
        // if($Request->ngay1 && $Request->ngay2){
        //     $product->whereBetween('ngayketthuc', array($Request->ngay1, $Request->ngay2));
        // }
        $articles = $articles->paginate(30);
        return view('pages.home',[
            'articles'=>$articles,
        ]);
    }

    public function searchnews(Request $Request)
    {
        $key = $Request->key;
        $news = news::where('status','true')->where('name','like',"%$key%")->orderBy('id','desc')->paginate(24);
        return view('pages.search',['news'=>$news, 'key'=>$key]);
    }

	public function dangky(Request $Request)
    {
  //       $head_setting = setting::where('id',1)->first();
  //       $mail = $head_setting['email'];
		
  //       $this->validate($Request,['phone' => 'Required'],[] );
  //       $name = $Request->name;
  //       $phone = $Request->phone;
  //       $email = $Request->email;
  //       $link = $Request->link;
  //       $content = $Request->content;
		// $date = date('m/d/Y h:i:s', time());
        
  //       Mail::send('email_feedback', array('name'=>$name,'phone'=>$phone,'email'=>$email,'link'=>$link,'content'=>$content,'date'=>$date) , function($message) use ($mail){
  //           $message->from($mail, 'annong5.com.vn');
  //           $message->to($mail, 'annong5.com.vn')->subject('Thông tin khách hàng');
  //       });
        
        //return view('pages.camon')->with('Alerts','Gửi thành công');
		return redirect('/')->with('Alerts','Thành công');
    }

    public function wishlist()
    {
        // $category = category::where('slug',$curl)->first();
        return view('pages.wishlist');
    }
    public function myaccount()
    {
        // $category = category::where('slug',$curl)->first();
        return view('pages.myaccount');
    }
    public function cart()
    {
        // $category = category::where('slug',$curl)->first();
        return view('pages.cart');
    }

    public function get_signin()
    {
        return view('pages.account.signin',[]);
    }

    public function get_signup()
    {
        return view('pages.account.signup',[]);
    }
    public function getresetpassword()
    {
        return view('pages.account.getresetpassword');
    }
    public function profile()
    {
        return view('pages.account.profile');
    }
    public function messages()
    {
        $messages = messages::where('user_id', Auth::User()->id)->orderBy('id','desc')->get();
        return view('pages.account.messages',['messages' => $messages]);
    }
    public function delall_messages($id){
        $list = messages::where('user_id', $id)->get();
        foreach ($list as $key => $value) {
            $messages = messages::where('id',$value->id)->first();
            $messages->delete();
        }
        return redirect()->back();
    }
    public function check_messages($id){
        $list = messages::where('user_id', $id)->get();
        foreach ($list as $key => $value) {
            $messages = messages::where('id',$value->id)->first();
            $messages->status = 'acctive';
            $messages->save();
        }
        return redirect()->back();
    }
}



