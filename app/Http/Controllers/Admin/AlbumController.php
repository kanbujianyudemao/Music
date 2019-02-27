<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Model\Admin\album;
use DB;
use Config;

class AlbumController extends Controller
{
    public function shezhi($id)
    {
        return view('admin.album.shezhi',['title'=>'专辑前台显示设置','id'=>$id]); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if($request->hidden){
            // dd(13);
            $sta = DB::table('album')->where('aid',$request->hidden)->first()->status;

            if($sta < 10){
                $res = [];
                $res['status'] = $sta;
                $a = DB::table('album')->where('status',$request->dingwei)->update($res);
                $rs = [];
                $rs['status'] = $request->dingwei;
                DB::table('album')->where('aid',$request->hidden)->update($rs);
            }else{
                //获取原来的歌单信息 更改状态
                $res = [];
                $res['status'] = 10;
               
                $a = DB::table('album')->where('status',$request->dingwei)->update($res);
                 
                //更改新的歌单
                $rs = [];
                $rs['status'] = $request->dingwei;
                DB::table('album')->where('aid',$request->hidden)->update($rs);
            }
        }
        
        $rs = DB::table('album')
            ->where( function ($query)use($request) {
        $sname = $request->input('sname');
        $aname = $request->input('aname');
        // echo $email;die;
        // 如果用户名不为空
        if(!empty($aname)){
            $query->where('aname', 'like', '%'.$aname.'%');
        }

        // 如果邮箱不为空
        if(!empty($sname)){
            $query->where('sname', 'like', '%'.$sname.'%');
        }

        })
        ->paginate($request->input('num', 10));
        $num = $request->num;

        return view('admin/album/index',[
            'title'=>'专辑浏览页',
            'request'=>$request,
            'rs'=>$rs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/album/add',['title'=>'专辑添加页']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    //     表单验证
        $this->validate($request, [
            'aname' => 'required',
            'sname' => 'required',
            'times' => 'required',
            'company' => 'required',
            'photo'=>'required',           
        ],[
            'aname.required'=>'专辑名不能为空',
            'sname.required'=>'歌手名不能为空',
            'times.required'=>'发行时间不能为空',
            'company.required'=>'发行公司不能为空',
            'photo.required'=>'图片不能为空',                       
        ]

    );
         $res = $request->except('_token','photo');

        // 文件上传
        if($request->hasFile('photo')){

            // 自定义名字
            $name = time().rand(1111,9999);

            // 获取后缀
            $suffix = $request->file('photo')->getClientOriginalExtension();

            // 移动
            $request->file('photo')->move('uploads',$name.'.'.$suffix);
        }
        $res['photo'] = '/uploads/'.$name.'.'.$suffix;       
        
        try{
           
            $rs = album::create($res);

            if($rs){

                return redirect('/admin/album')->with('success','添加成功');
            }
        }catch(\Exception $e){

            return back()->with('error','添加失败');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // dd($id);
         // dd($request->id);
        // return 1;
        $rs = DB::table('album')
            ->join('music', 'album.aid', '=', 'music.aid')
            // ->select('album.*', 'music.*')
            ->where('music.aid',$id)
            // ->where('sname','like','%'.$sname.'%')
            ->where(function($query) use($request){
                //检测关键字
                $aname = $request->input('aname');
                $sname = $request->input('sname');
                //如果专辑名不为空
                if(!empty($aname)) {
                    $query->where('aname','like','%'.$aname.'%');
                }
                //如果歌手不为空
                if(!empty($sname)) {
                    $query->where('sname','like','%'.$sname.'%');
                }

            })
            ->paginate($request->input('num', 10));
        $num = $request->num;
        
        // $rs['0']->aid = $id;
        // dd($rs['0']->aid);
        // dd($rs);
        return view('admin/album/album_music',[
            'title'=>'专辑详细页',
            'request'=>$request,
            'rs'=>$rs,
            'id'=>$id
        ]);
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
        $rs = album::find($id);
        // dd($rs);
         return view('admin/album/edit',[
            'title'=>'专辑修改页',
            // 'request'=>$request,
            'rs'=>$rs,
            // 'id'=>$id
        ]);
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
        // return 1;
        // dd($id);

    //     表单验证
        $this->validate($request, [
            'aname' => 'required',
            'sname' => 'required',
            'times' => 'required',
            'company' => 'required',
            'photo'=>'required',           
        ],[
            'aname.required'=>'专辑名不能为空',
            'sname.required'=>'歌手名不能为空',
            'times.required'=>'发行时间不能为空',
            'company.required'=>'发行公司不能为空',
            'photo.required'=>'图片不能为空',                       
        ]

    );
         $res = $request->except('_token','photo','_method');

        // 文件上传
        if($request->hasFile('photo')){

            // 自定义名字
            $name = date('YmdHis').rand(1111,9999);
            // dd($name);

            // 获取后缀
            $suffix = $request->file('photo')->getClientOriginalExtension();

            // 移动
            $request->file('photo')->move('uploads',$name.'.'.$suffix);
        }
        $res['photo'] = '/uploads/'.$name.'.'.$suffix;   
        // dd($res->aid);    
         // $rs = album::where('aid',$id)->update($res);
        try{
           
            $rs = album::where('aid',$id)->update($res);

            if($rs){

                return redirect('/admin/album')->with('success','修改成功');
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
            $rs = DB::table('album')->where('aid',$id)->delete();

            if($rs){

                return redirect('/admin/album')->with('success','删除成功');
            }
        }catch(\Exception $e){

            return back()->with('error','删除失败');

        }
    }

    public function search(Request $request, $id)
    {
        $rs = DB::table('album')
            ->join('music', 'album.aid', '=', 'music.aid')
            ->where('music.aid',$id)
            ->select('album.*', 'music.*')
            ->where(function($query) use($request){
        //检测关键字
        
        $mname = $request->input('mname');
        $aname = $request->input('aname');
        //如果歌手名不为空
        if(!empty($mname)) {
            $query->where('mname','like','%'.$mname.'%');
        }
        //如果专辑名不为空
        if(!empty($aname)) {
            $query->where('aname','like','%'.$aname.'%');
        }
    })->paginate($request->input('num', 10));
   
        return view('admin/album/album_music',[
            'title'=>'专辑歌曲页',
            'request'=>$request,
            'rs'=>$rs,
        ]);
    }

    public function upload(Request $request)
    {
        // return 1;
     //获取上传的文件对象
        $file = $request->file('photo');
        // dd($file);
        //判断文件是否有效
        if($file->isValid()){
            //上传文件的后缀名
            $entension = $file->getClientOriginalExtension();
            // 设置名字
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            // dd($newName);
            $path = $file->move(Config::get('app.uploads'), $newName);
            // dd($path);
            $filepath = '/uploads/'.$newName;
            //返回文件的路径
            // dump($filepath);
            return  $filepath;
        }

    }
    public function music(Request $request,$aname)
    {
        // dd($aname);
        $rs = DB::table('album')
            ->join('music', 'album.aname', '=', 'music.aname')
            ->where('music.aname',$aname)
            ->where(function($query) use($request){
                //检测关键字
                $aname = $request->input('aname');
                $sname = $request->input('sname');
                //如果专辑名不为空
                if(!empty($aname)) {
                    $query->where('aname','like','%'.$aname.'%');
                }
                //如果歌手不为空
                if(!empty($sname)) {
                    $query->where('sname','like','%'.$sname.'%');
                }
            })
            ->paginate($request->input('num', 10));
            // dd($rs);
        $num = $request->num;
        return view('admin/album/album_music',[
            'title'=>'专辑详细页',
            'request'=>$request,
            'rs'=>$rs
        ]);
    }

}
