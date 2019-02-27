<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

use App\Model\Admin\Rooter;
use Hash;
use Config;
class LoginController extends Controller
{


    public function login(Request $request)
    {
    	return view('admin/login/login');
    }



     public function dologin(Request $request)
    {

        // dd(123);
    	// echo 123;
    	//表单验证

    	//检测验证码
        // $code = session('code');

        // if($code != $request->code){

        //     return back()->with('error','验证码错误!');
        // }

    	//检测用户名
        $users = Rooter::where('username',$request->username)->first();
        // dd($users);
        if(!$users){

            return back()->with('error','用户名或密码错误!');
        }

        
    	//检测密码  hash   
        if (!Hash::check($request->password, $users->password)) {
            
            return back()->with('error','用户名或密码错误!');

        }

        // 检测密码   加密解密
        // if (decrypt($users->password) != $request->password) {
            
        //     return back()->with('error','用户名或密码错误!');

        // }

        //存储用户id
        session(['rid'=>$users->rid]);

        

    	// //提示信息
        return redirect('/admin')->with('success','登录成功');


    }

    public function outlogin()
    {
    	session()->flush();
    	

    	return view('admin/login/login');
    }

    //修改头像
    public function profile()
    {
        $rs = Rooter::where('rid',session('rid'))->first();

        return view('admin.login.profile',[
            'title'=>'修改头像信息',
            'rs'=>$rs

        ]);
    }

    public function doprofile(Request $request)
    {
        //获取上传的文件对象  $_FILES
        $file = $request->file('profile');
        //判断文件是否有效
        if($file->isValid()){
            //上传文件的后缀名
            $entension = $file->getClientOriginalExtension();
            //设置名字  32948324324832894.jpg
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;

            $path = $file->move(Config::get('app.uploads'),$newName);

            $filepath = '/uploads/'.$newName;

            $res['photo'] = $filepath;

            

            //返回文件的路径
            try{
           
            $rs = Rooter::where('rid',session('rid'))->update($res);


            if($rs){

                return redirect('/admin')->with('success','修改成功');
            }
        }catch(\Exception $e){

            return back()->with('error','修改失败');

        }
        }
    }


    //修改密码
    public function pass()
    {
        return view('admin.login.pass',['title'=>'修改密码']);
    }

    public function dopass(Request $request)
    {
        //表单验证
        // dd(123);
        //获取数据库密码
        $pass = Rooter::where('rid',session('rid'))->first();
        
        //获取旧密码
        $oldpass = $request->oldpass;
        // dd(Hash::check($oldpass, $pass->password));

        // dd($oldpass);

        //检测密码  hash   
        if (!Hash::check($oldpass, $pass->password)) {
            
            return back()->with('error','原密码错误!');

        }

        // if(decrypt($pass->password) != $oldpass){

        //     return back()->with('error','原密码错误');
        // }

        // $rs['password'] = encrypt($request->password);
        $rs['password'] = Hash::make($request->input('password'));
        // dd($rs);


        try{
           
            $data = Rooter::where('rid',session('rid'))->update($rs);
            if($data){

                return redirect('/admin/login')->with('success','添加成功');
            }
        }catch(\Exception $e){

            return back()->with('error','修改密码失败');
        }

    }  
    
}
