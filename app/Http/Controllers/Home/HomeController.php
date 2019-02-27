<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class HomeController extends Controller
{
    //前台专辑列表页
    public function albumlist($id)
    {
        $res = DB::table('album')->where('aid',$id)->first();
        $rs = DB::table('music')->where('aname',$res->aname)->get();
              
        return view('home.album.list',['res'=>$res,'rs'=>$rs]);      
    }
	//前台歌单列表
    public function specialshow()
    {   
        $rs = DB::table('special')->get();
        
    	return view('home/special',['rs'=>$rs]);
    }

    //前台首页歌单显示
    public function index()
    {   
        // 根据地区查找歌手
        $arr = [];
        $res = DB::table('singer')->where('szone',0)->paginate(8);
        // dd($res);
        foreach($res as $k => $v)
        {
            $arr[] = DB::table('singer')
                    ->join('music','singer.sname','music.sname')
                    ->where('sid',$v->sid)
                    ->orderBy('mid','desc')
                    ->first();
        }
        // dd($arr);
        // $str='';

        if(session('uid')){
            // 根据session里的uid查找个人收藏的歌曲
            $ress = DB::table('collect')->where('uid',session('uid'))->get()->toArray();
            $str = '';
            foreach($ress as $k => $v){
                $str .= $v->sname.' - '.$v->mname.',';
            }
        }else{
            $str = '';
        }    
        // dd($arr);

        //歌单数据
        $rs = DB::table('special')->orderBy('status')->limit('5')->get();
        //专辑数据
    	$rsz = DB::table('album')->orderBy('status')->limit('10')->get();
        //歌手数据
        $rss = DB::table('singer')->where('szone','0')->limit('5')->get();
        //总排行数据
        $rspz = DB::table('music')->orderBy('hot','desc')->limit('2')->get();
        //新歌排行数据
         $rspx = DB::table('music')->orderBy('mid','desc')->limit('2')->get();
         //流行排行数据
         $rspl = DB::table('music')
        ->where('styles',0)->orwhere('styles',1)
        ->orderby('hot','desc')->limit('2')
        ->get();
        // dd($str);
    	return view('home.index',['rs'=>$rs,'rsz'=>$rsz,'rss'=>$rss,'rspz'=>$rspz,'rspx'=>$rspx,'rspl'=>$rspl,'arr'=>$arr,'str'=>$str]);
    }

    //mv播放
    public function mvplay()
    {
        return view('home.mv.index');
    }

    //前台热门歌手
    public function geshou(Request $request)
    {
        $szone = $request->get('val');
        $rss = DB::table('singer')->where('szone',$szone)->limit('5')->get(); 
        return response()->json($rss);
    }

    //音乐播放
    public function play($id)
    {   
        $rs = DB::table('music')->where('mid',$id)->first();

        // 将查询出来的数据放入session中, 注意session的键不要冲突,否则会覆盖

        // 在前台遍历session中的数据, 不要直接遍历遭到的这一条

        // 让session中最后一条播放

        // 将数组装换为字符串
        return view('home.play.play',[
            'rs' => $rs
        ]);
    }

    public function sou(Request $request)
    {
        $sou = $request->sou;
        
        $res = DB::table('music')->where('mname','like','%'.$sou.'%')->get();
        // dd($res);
        return view('home.sou',['res'=>$res,'title'=>'搜索页','sou'=>$sou]);
    }


    //前台搜索页专辑跳转详情页
    public function albumsou($name)
    {
        
        $res = DB::table('album')->where('aname',$name)->first();
        $rs = DB::table('music')->where('aname',$res->aname)->get();


        return view('home.album.list',['res'=>$res,'rs'=>$rs]);
    }
}
