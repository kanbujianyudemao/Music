<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\captcha;
use Config;
use DB;
use Hash;
class PersonController extends Controller
{
    //
    public function editprofile()
    {
    	// dd(session('uid'));
    	$uid = session('uid');
    	$rs = DB::table('users')->where('uid',session('uid'))->get();
    	// dd($rs);
    	return view('home/person/profile',['rs'=>$rs]);
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

    public function update(Request $request)
    {
    	// $rs = $request->file();
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
    	// dd($res);
    	
    	// dd($rs);
    	try{
           
            $rs = DB::table('users')->where('uid','=',session('uid'))->update($res);

            if($rs){

                return redirect('/home/person')->with('success','修改成功');
            }
        }catch(\Exception $e){

            return back()->with('error','修改失败');

        }
    }

    public function edit()
    {
    	$uid = session('uid');
    	$rs = DB::table('users')->where('uid',session('uid'))->get();
    	// dd($rs);
    	return view('/home/person/edit',[
    		'title'=>'因乐 因你而乐',
    		'rs'=>$rs
    	]);
    }

    public function editPerson(Request $request)
    {
    	// dd($request->all());
    	// dd(session('uid'));
    	$res = $request->except('_token');
    	// dd($res);
    	$rs = DB::table('users')->where('uid','=',session('uid'))->update($res);
        // dd($rs);
    	try{
            
            // $rs = DB::table('users')->update($res);

            if($rs){
            	// return 1;
                return redirect('/home/person')->with('success','修改成功');
            }
        }catch(\Exception $e){
        	// return 0;
            return back()->with('error','修改失败');

        }
    }

    public function pass()
    {
    	$uid = session('uid');
    	$rs = DB::table('users')->where('uid',session('uid'))->get();
    	// dd($rs);
    	return view('/home/person/pass',[
    		'title'=>'因乐 因你而乐',
    		'rs'=>$rs
    	]);
    }

    public function editpass(Request $request)
    {
    	// return 1123;
    	
    	$id = session('uid');
    	// dd($id);
    	if(!captcha_check($request->input('code'))){
		    return back()->withErrors("验证码有误");
		}

		$this->validate($request, [
            'password' => 'required|regex:/^\w{6,12}$/', 
            'repassword' => 'same:password',          
        ],[
            'password.required'=>'密码不能为空',  
            'password.regex'=>'密码由6~12位字母数字下划线组成',
            'repassword.same'=>'两次密码不一致',
        ]);
		$res = $request->except('_token','repassword','code');

    	$res['password'] = Hash::make($request->input('password'));
    	
    	 try{
          	$rs = DB::table('users')->where('uid',$id)->update($res);

            if($rs){

                return back()->with('success','修改成功');
            }
        }catch(\Exception $e){

            return back()->with('error','修改失败');

        }

    	// dd($rs);
		// return view('/home/person/profile',['rs'=>$rs]);
    }
}
