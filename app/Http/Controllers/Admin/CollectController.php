<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Collect;

class CollectController extends Controller
{
    //
    public function index(Request $request)
    {
    	$uid = $request->uid;
        // dd($uid);

    	$rs = DB::table('users')
	        	->join('collect', function ($join)use($request) {
	            $join->on('users.uid', '=', 'collect.uid')
	            ->where('collect.uid',  $request->uid);
	        })->paginate(10);

        // dd($rs[0]->username);
    	// die;
    	return view('admin/collect/index',[
    		'title'=>'用户收藏列表',
    		'request'=>$request,
    		'rs'=>$rs
    	]);
    }

    public function search(Request $request)
    {
        // dd($request->input);
        $rs = Collect::orderBy('cid','asc')
        ->where('uid', $request->uid)
        ->where(function($query) use($request){
        //检测关键字
        $mname = $request->input('mname');
        // dd($mname);
        $sname = $request->input('sname');
        $aname = $request->input('aname');
        // $query->where('uid',$request->uid);
        //如果歌曲名不为空
        if(!empty($mname)) {
            $query->where('mname','like','%'.$mname.'%');
        }
        //如果歌手名不为空
        if(!empty($sname)) {
            $query->where('sname','like','%'.$sname.'%');
        }
        //如果专辑名不为空
        if(!empty($aname)) {
            $query->where('aname','like','%'.$aname.'%');
        }
    })->paginate($request->input('num', 10));

         $num = $request->num;

            return view('admin/collect/index',[
                'title'=>'用户收藏列表',
                'request'=>$request,
                'rs'=>$rs
            ]);
    }
}
