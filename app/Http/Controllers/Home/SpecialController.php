<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class SpecialController extends Controller
{   



    //歌单列表页
    public function list($id)
    {
        $res = DB::table('special')->where('gdid',$id)->first();
        $mid = $res->music_id;
        $mid = rtrim($mid,',');
        $mid = explode(',',$mid);
        $music = [];
        //获取歌曲信息
        foreach ($mid as $k => $v) {
            $music[] = DB::table('music')->where('mid',$v)->first();
        }
        return view('home.special.list',['res'=>$res,'music'=>$music]);
    }

    //用户歌单列表页
    public function myspecial()
    {   

        $uid = session('uid');
        $res = DB::table('users')->where('uid',$uid)->first();

        $uname = $res->uname;
        // dd($uname);
        $rs = DB::table('special')->where('zhizuo',$uname)->get();
        
        return view('home.special.myspecial',['res'=>$res,'rs'=>$rs]);
    }

    public function addspecial()
    {   

        $uid = session('uid');
        $rs = DB::table('collect')
                ->join('music','music.mname','collect.mname')
                ->where('collect.uid',$uid)
                ->get();
        return view('/home/special/addspecial',['rs'=>$rs]);
    }


    //用户歌单详情页
    public function listspecial($id)
    {   
        $uid = session('uid');
        $res = DB::table('users')->where('uid',$uid)->first();
        //获取歌单信息
        $special = DB::table('special')->where('gdid',$id)->first();
        $mid = $special->music_id;
        $mid = rtrim($mid,',');
        $mid = explode(',',$mid);
        $music = [];
        //获取歌曲信息
        foreach ($mid as $k => $v) {
            $music[] = DB::table('music')->where('mid',$v)->first();
        }
        return view('home.special.listspecial',['res'=>$res,'music'=>$music,'special'=>$special]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $uid = session('uid');
        $res = DB::table('users')->where('uid',$uid)->first();
        $rs = $request->except('_token');

        // dd($rs);
        $str = "";
        foreach ($rs as $k => $v) {
            foreach ($v as $kk => $vv) {
               $str .=$vv.',';
            }
        }
        return view('/home/special/add',['res'=>$res,'str'=>$str]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gdname' => 'required',
            'title' => 'required',
            'styles' => 'required',                        
            'jianjie' =>'required',
            'photo' =>'required',           

        ],[
            'gdname.required'=>'歌单名称不能为空',
            'title.required'=>'标题不能为空',           
            
            'styles.required' => '风格不能为空',
            'jianjie.required'=>'简介不能为空',
            'photo.required'=>'图片不能为空',
            ]
        );
        // dd($request->hidden);
        $uid = session('uid');
        $uname = DB::table('users')->where('uid',$uid)->first()->uname;
        $res = $request->except('_token','photo','hidden');


        // 文件上传
        if($request->hasFile('photo')){

            //自定义名字
            $name = time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('photo')->getClientOriginalExtension(); 

            //移动
            $request->file('photo')->move('uploads',$name.'.'.$suffix);
        }

        $res['photo'] = '/uploads/'.$name.'.'.$suffix;
        $res['zhizuo'] = $uname;
        $res['music_id'] = $request->hidden;
        //往数据库中添加数据
        $rs = DB::table('special')->insert($res);

        if($rs){

            //跳转
            return redirect('/home/special/myspecial');
        } else {

            return back();
        }

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
        $uid = session('uid');
        // 

        // dd($res);
        //得到用户收藏所有歌曲
        $rs = DB::table('collect')
                ->join('music','music.mname','collect.mname')
                ->where('collect.uid',$uid)
                ->get();

        //得到歌单歌曲        
          $res = DB::table('special')->where('gdid',$id)->first()->music_id;
          // var_dump($rs['0']->mid);die;
        return view('home.special.edit',['rs'=>$rs,'res'=>$res,'gdid'=>$id]);
    }

    public function edits(Request $request,$id)
    {   
        $uid = session('uid');
        $res = DB::table('users')->where('uid',$uid)->first();
        $rs = $request->except('_token');

        // dd($rs);
        $str = "";
        foreach ($rs as $k => $v) {
            foreach ($v as $kk => $vv) {
               $str .=$vv.',';
            }
        }
        $spe = DB::table('special')->where('gdid',$id)->first();
        // dd($spe);
        return view('home.special.edits',['res'=>$res,'str'=>$str,'spe'=>$spe]);
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
        $this->validate($request, [
            'gdname' => 'required',
            'title' => 'required',
            'styles' => 'required',                        
            'jianjie' =>'required',
            'photo' =>'required',           

        ],[
            'gdname.required'=>'歌单名称不能为空',
            'title.required'=>'标题不能为空',           
            
            'styles.required' => '风格不能为空',
            'jianjie.required'=>'简介不能为空',
            'photo.required'=>'图片不能为空',
            ]
        );
        // dd($request->hidden);
        $uid = session('uid');
        $uname = DB::table('users')->where('uid',$uid)->first()->uname;
        $res = $request->except('_token','photo','hidden');


        // 文件上传
        if($request->hasFile('photo')){

            //自定义名字
            $name = time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('photo')->getClientOriginalExtension(); 

            //移动
            $request->file('photo')->move('uploads',$name.'.'.$suffix);
        }

        $res['photo'] = '/uploads/'.$name.'.'.$suffix;
        $res['zhizuo'] = $uname;
        $res['music_id'] = $request->hidden;
        //往数据库中添加数据
        $rs = DB::table('special')->where('gdid',$id)->update($res);

        if($rs){

            //跳转
            return redirect('/home/special/myspecial');
        } else {

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        try{
           
            $res = DB::table('special')->where('gdid',$id)->delete();

            if($res){

                return redirect('/home/special/myspecial')->with('success','删除成功');
            }
        }catch(\Exception $e){

            return back()->with('error','删除失败');

        }
    }
}
