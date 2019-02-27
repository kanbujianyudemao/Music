<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Model\Admin\Singer;
use Config;
use DB;

class UsersSongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //  获取数据
        // $rs = \DB::table('orders')->paginate(5);

        //单条件查询
        $uname = $request->input('sname');
        //获取数据
        $rs = singer::where('sname','like','%'.$uname.'%')
        ->paginate($request->input('num',5));
        return view('/admin/userssong/index',[
            'title'=>'歌手管理页面',
            'rs'=>$rs,
            'request'=>$request
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
        return view('/admin/userssong/add',[
            'title'=>'歌手添加页面'
        ]);
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
        //表单验证
        $this->validate($request, [
            'sname' => 'required',
            'sex' => 'required',
            'szone' =>'required',
            'cv' =>'required',
            'photo' =>'required',

        ],[
            'sname.required'=>'歌手名不能为空!!',
            'sex.required'=>'性别不能为空',
            'szone.required'=>'籍贯不能为空',
            'cv.required'=>'简介不能为空',
            'photo.required'=>'照片不能为空',
        ]
        );  

        $res = $request->except('_token','photo','repass');

        //文件上传
        if($request->hasFile('photo')){

            //自定义名字
            $name = time().rand(1111,9999);
          //获取后缀
            $suffix = $request->file('photo')->getClientOriginalExtension(); 

            //移动
            $request->file('photo')->move('uploads',$name.'.'.$suffix);

            $res['photo'] = '/uploads/'.$name.'.'.$suffix;
        }

        //hash加密
        // $res['password'] = Hash::make($request->input('password'));

            $rs = Singer::create($res);
        try{
            if($rs){
                return redirect('/admin/userssong')->with('success','添加成功');
            }
        }catch(\Exception $e){

            return back()->with('error','添加失败');

        }
        return view('/admin');        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        //根据uid获取数据
        $res =\DB::table('singer')->where('sid',$uid)->first();
        //dump($res->cv);
        return view('/admin/userssong/edit',[
            'title'=>'歌手修改页面',
            'res'=>$res
        ]);       
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sid)
    {
        //dump($request->all());
       $res = $request->except('_token','_method','photo');

         //文件上传
        if($request->hasFile('photo')){

            //自定义名字
            $name = time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('photo')->getClientOriginalExtension(); 

            //移动
            $request->file('photo')->move('uploads',$name.'.'.$suffix);

            $res['photo'] = '/uploads/'.$name.'.'.$suffix;

        }
        //dd($res);
        try{
            $rs = Singer::where('sid',$sid)->update($res);
            if($rs){
                return redirect('/admin/userssong')->with('success','修改成功');
            }
        }catch(\Exception $e){
            return back()->with('error','修改失败');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sid)
    {
        

        try{
           $res = singer::where('sid',$sid)->delete();
            if($res){
                return redirect('/admin/userssong')->with('success','删除成功');
            }
        }catch(\Exception $e){
            return back()->with('error','删除失败');
        }

    }
}
