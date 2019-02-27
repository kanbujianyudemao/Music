<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Special;
class SpecialController extends Controller
{   

    

    public function shezhi($id)
    {
        return view('admin.special.shezhi',['title'=>'歌单前台显示设置','id'=>$id]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         //获取改变位置的歌单status值
        if($request->hidden){
        $sta = DB::table('special')->where('gdid',$request->hidden)->first()->status;
        if($sta < 5){
            $res = [];
            $res['status'] = $sta;
            $a = DB::table('special')->where('status',$request->dingwei)->update($res);
            $rs = [];
            $rs['status'] = $request->dingwei;
            DB::table('special')->where('gdid',$request->hidden)->update($rs);
        }else{
            //获取原来的歌单信息 更改状态
            $res = [];
            $res['status'] = 5;
           
            $a = DB::table('special')->where('status',$request->dingwei)->update($res);
             
            //更改新的歌单
            $rs = [];
            $rs['status'] = $request->dingwei;
            DB::table('special')->where('gdid',$request->hidden)->update($rs);
        }
    }
        $rs = Special::orderBy('gdid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $gdname = $request->input('gdname');
                
                //如果用户名不为空
                if(!empty($gdname)) {
                    $query->where('gdname','like','%'.$gdname.'%');
                }                
            })
            ->paginate(5);
        //获取数据
        
        // dd($rs);
        return view('admin.special.index',['rs'=>$rs,'title'=>'歌单列表页']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.special.add',['title'=>'歌单添加页面']);
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
            'styles' => 'required',
            
            'title' =>'required',
            'zhizuo' =>'required',
            'jianjie' =>'required',
            'photo' =>'required',
            


        ],[
            'gdname.required'=>'歌单名称不能为空',
            'style.required'=>'风格不能为空',
            
            'title.required' => '标题名称不能为空',
            'zhizuo.required' => '制作者名称不能为空',
            'jianjie.required' => '简介名称不能为空',
            'photo.required' => '图片名称不能为空',
            
            ]
        );
        $res = $request->except('_token','photo');
        //文件上传
        if($request->hasFile('photo')){

            //自定义名字
            $name = time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('photo')->getClientOriginalExtension(); 

            //移动
            $request->file('photo')->move('uploads',$name.'.'.$suffix);
        }

        $res['photo'] = '/uploads/'.$name.'.'.$suffix;
        // $res['password'] = Hash::make($request->input('password'));
       
        //往数据库中添加数据
        $rs = Special::create($res);

        if($rs){

            //跳转
            return redirect('admin/special');
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
        //根据gdid查询
        $rs = special::where('gdid',$id)->first();
        // dd($rs);
        return view('admin.special.edit',['rs'=>$rs,'title'=>'管理员修改页面']);
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
            'styles' => 'required',
            
            'title' =>'required',
            'zhizuo' =>'required',
            'jianjie' =>'required',
            'photo' =>'required',
            


        ],[
            'gdname.required'=>'歌单名称不能为空',
            'style.required'=>'风格不能为空',
            
            'title.required' => '标题名称不能为空',
            'zhizuo.required' => '制作者名称不能为空',
            'jianjie.required' => '简介名称不能为空',
            'photo.required' => '图片名称不能为空',
            
            ]
        );
        $res = $request->except('_token','photo','_method');
        //文件上传
        if($request->hasFile('photo')){

            //自定义名字
            $name = time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('photo')->getClientOriginalExtension(); 

            //移动
            $request->file('photo')->move('uploads',$name.'.'.$suffix);
        }

        $res['photo'] = '/uploads/'.$name.'.'.$suffix;
        // $res['password'] = Hash::make($request->input('password'));
       
        //往数据库中添加数据
        try{
           
            $rs = Special::where('gdid',$id)->update($res);


            if($rs){

                return redirect('/admin/special')->with('success','修改成功');
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
    public function destroy($id)
    {
        try{
           
            $res = Special::where('gdid',$id)->delete();

            if($res){

                return redirect('/admin/special')->with('success','删除成功');
            }
        }catch(\Exception $e){

            return back()->with('error','删除失败');

        }
    }
}
