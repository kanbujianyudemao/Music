<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Music;
use App\Model\Admin\Collect;
use DB;

class MusicController extends Controller
{
    //
    public function index()
    {
        // 根据session里的uid查找个人收藏的歌曲
        $str = '';
        if(session('uid')){
            $ress = DB::table('collect')->where('uid',session('uid'))->get()->toArray();
            foreach($ress as $k => $v){
                $str .= $v->sname.' - '.$v->mname.',';
            }
        }
        
        $rs = DB::table('singer')
                ->join('music','singer.sname','music.sname')
                ->where('szone',0)
                ->get();
    	return view('/home/music/index',['rs'=>$rs,'str'=>$str]);
    }

    public function show(Request $request)
    {

        // 根据地区查找歌手
        $rs = [];
    	$res = DB::table('singer')->where('szone',$request->szone)->paginate(30);
        if($res){
            foreach($res as $k => $v)
            {
                
                $rs[] = DB::table('singer')
                ->join('music','singer.sname','music.sname')
                ->where('sid',$v->sid)
                ->orderBy('mid','desc')
                ->first();
            }
        }else{ 
            $rs[] = '';
        } 
        if(session('uid')){
            // 根据session里的uid查找个人收藏的歌曲
            $ress = DB::table('collect')->where('uid',session('uid'))->get()->toArray();
            $str = '';
            foreach($ress as $k => $v){
                $str .= $v->sname.' - '.$v->mname.',';
            }
            $rs[] = $str;
        }else{
            $rs[] = '';
        }
        // dd($rs);
    	return response()->json($rs);
    	// return json($rs);
    }

    public function collect(Request $request)
    {
        // dd($request->mname,$request->sname);
        
        $rs = Music::where([
                    ['mname',$request->mname],
                    ['sname',$request->sname]
                ])
        ->increment('hot');
        
        // 查询专辑
        $rs = Music::select('aname')
        ->where([
                    ['mname',$request->mname],
                    ['sname',$request->sname]
                ])
        ->first();
        // dd($rs);
        // 添加到收藏列表
        $rs = Collect::insert([
            'uid'=>session('uid'),
            // 'uid'=>session('uid'),
            'sname'=>$request->sname,
            'mname'=>$request->mname,
            'aname'=>$rs->aname,
            'status'=>1
        ]);

        // dd($rs);
        return 1;
    }

    public function xcollect(Request $request)
    {
        // dd($request->mname,$request->sname);
        $rs = Music::where([
                    ['mname',$request->mname],
                    ['sname',$request->sname]
                ])
        ->decrement('hot');
        // 查询专辑
        $rs = Music::select('aname')
        ->where([
                    ['mname',$request->mname],
                    ['sname',$request->sname]
                ])
        ->first();
        // dd($rs);
        // 从收藏列表删除
        $rs = Collect::where([
            // 'uid'=>17,
            'uid'=>session('uid'),
            'sname'=>$request->sname,
            'mname'=>$request->mname,
            'aname'=>$rs->aname,
            'status'=>1
        ])->delete();
        return 1;
    }



    public function show2(Request $request)
    {

        // 根据地区查找歌手
        // $rs = [];
        // $res = DB::table('singer')->where('szone',$request->szone)->paginate(30);
        // if($res){
        //     foreach($res as $k => $v)
        //     {
                
            $rs = DB::table('singer')
            ->join('music','singer.sname','music.sname')
            ->where('szone',$request->szone)
            // ->orderBy('mid','desc')
            ->get();
                // dd($rs);
        //     }
        // }else{ 
        //     $rs[] = '';
        // } 
        // $rs = DB::table('singer')
        //     ->join('music','singer.sname','music.sname')
        //     ->where('sid',$v->sid)
        //     ->where()
        if(session('uid')){
            // 根据session里的uid查找个人收藏的歌曲
            $ress = DB::table('collect')->where('uid',session('uid'))->get()->toArray();
            $str = '';
            foreach($ress as $k => $v){
                $str .= $v->sname.' - '.$v->mname.',';
            }
            $rs[] = $str;
        }else{
            $rs[] = '';
        }
        // dd($rs);
        return response()->json($rs);
        // return json($rs);
    }
}
