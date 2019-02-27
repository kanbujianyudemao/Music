<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ListController extends Controller
{


    public function list_zone(Request $request)
    {
        $szone = $request->get('szone');
        $rss = DB::table('singer')->where('szone',$szone)->get(); 
        return response()->json($rss);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        $res = DB::table('singer')->get();
        
        
         return view('/home/list/index',[
            'title'=>'歌手',
            'res'=>$res
            
        ]);
    }
    public function listsinger( Request $request ,$sid )
    {
        // 根据session里的uid查找个人收藏的歌曲
        $str = '';
        if(session('uid')){
            $ress = DB::table('collect')->where('uid',session('uid'))->get()->toArray();
            
            foreach($ress as $k => $v){
                $str .= $v->sname.' - '.$v->mname.',';
            }
        }
        $res = DB::table('singer')->where('sid',$sid)->first();
        //dd($res);
        $rs = $res->sname;
        //dd($rs);
        $music = DB::table('music')->where('sname',$rs)->get();
        //dd($music);
        return view('/home/list/listsinger',[
            'title'=>'歌手详情',
            'music'=>$music,
            'res'=>$res,
            'str'=>$str
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
