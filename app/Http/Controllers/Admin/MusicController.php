<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Music;
use App\Model\Admin\album;
use Config;
use DB;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //  获取数据
        $rs = DB::table('Music')->first();
        //单条件查询
        $uname = $request->input('mname');
        //获取数据
        $rs = music::where('mname','like','%'.$uname.'%')
        ->paginate($request->input('num',10));
        return view('/admin/music/index',[
            'title'=>'歌曲管理页面',
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
        
        return view('/admin/music/add',[
            'title'=>'歌曲添加页面'
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
        //表单验证
        $fields = $request->all();
        //曲风多选框
        $this->validate($request, [
            'mname' => 'required',
            'sname' => 'required',
            'aname' => 'required',
            'styles' =>'required',
            'photp' =>'required',
            'urll' =>'required',
            'times' =>'required',
        ],[
            'mname.required'=>'歌曲名不能为空!!',
            'sname.required'=>'歌手名不能为空',
            'aname.required'=>'专辑名不能为空',
            'styles.required'=>'曲风不能为空',
            'photp.required'=>'照片不能为空',
            'urll.required'=>'歌曲上传不能为空',
            'times.required'=>'歌曲时长不能为空',
        ]);

        $imageUrl = $this->uploadFile($request, 'photp');
        $musicUrl = $this->uploadFile($request, 'urll');
        $lrcUrl = $this->uploadFile($request, 'lrc');
        // dd($musicUrl);

        $fields['photp'] = $imageUrl;
        $fields['urll'] = $musicUrl;
        if($lrcUrl){
            $fields['lrc'] = $lrcUrl;
        }
        $res = Music::create($fields);

        // 查询专辑是否存在
        $search = album::where([['sname',$request->sname],['aname',$request->aname]])->first();
        // dd($search);
        if(!$search){
            album::insert([
                'aname'=>$request->aname,
                'sname'=>$request->sname
                // 'styles'=>$request->styles
            ]);
        }

        if ($musicUrl && $imageUrl) {
            // 文件上传成功
            try{
                        if($res){
                            return redirect('/admin/music')->with('success','添加成功');
                        }
                    }catch(\Exception $e){

                        return back()->with('error','添加失败');

                }
                    
        }

        return view('/admin/index',['title'=>'后台首页']);
    }


    /**
     * 判断文件是否上传成功
    **/
    public function uploadFile(Request $request, $file)
    {
        $up = new UploadsController($request, $file);
        // 判断文件是否上传成功
        if($up -> uploadFile($file)){
            // 成功, 获取url路径并返回
            return $up->getFileUrl();
        }

        // 失败
        return false;
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
        //根据mid获取数据
        $res =\DB::table('music')->where('mid',$id)->first();
        //dump($res->cv);
        return view('/admin/music/edit',[
            'title'=>'歌曲修改页面',
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
    public function update(Request $request, $id)
    {
        //

        //表单验证
        $fields =  $request->except('_token','_method','photp','urll');
        //dd($res);
        $imageUrl = $this->uploadFile($request, 'photp');
        $musicUrl = $this->uploadFile($request, 'urll');
        /*$res = $request->except('_token','photp','urll');*/
        
        /*if ( $musicUrl && $imageUrl ) {
             
        }*/
        $fields['photp'] = $imageUrl;
        $fields['urll'] = $musicUrl;
        $res = Music::where('mid',$id)->update($fields);
            
        if ($musicUrl && $imageUrl) {
            // 文件上传成功
            
            try{
                        if($res){
                            return redirect('/admin/music')->with('success','修改成功');
                        }
                    }catch(\Exception $e){

                        return back()->with('error','修改失败');

                }
                    
        }

        return view('/admin/index',['title'=>'后台首页']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($mid)
    {
        //
        
        try{
           $res = Music::where('mid',$mid)->delete();
            if($res){
                return redirect('/admin/music')->with('success','删除成功');
            }
        }catch(\Exception $e){
            return back()->with('error','删除失败');
        }
    }
}
