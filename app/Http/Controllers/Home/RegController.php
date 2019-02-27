<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\User;
use App\Http\Controllers\Home\captcha;
use Mail;
use Hash;
use DB;

class RegController extends Controller
{
    //
    public function register()
    {
    	return view('home/user/register',[
    		// 'title'=>'用户的注册页面'
    	]);
    }

    public function doregister(Request $request)
    {
    	// dd($request);
        $rs = User::select('username')->where('username',$request->username)->first();
        if($rs){
            return back()->withErrors('用户名已存在');
        }
        // dd($rs);
    	
    	if(!captcha_check($request->input('code'))){
		    return back()->withErrors("验证码有误");
		}
		
    	$this->validate($request, [
            'username' => 'required|regex:/^\w{6,12}$/',
            'uname' => 'required|regex:/^\S{2,12}$/',
            'password' => 'required|regex:/^\w{6,12}$/',
            'repassword' => 'same:repassword',
            'sex' => 'required',
            'email'=>'required|email'           
        ],[
            'username.required'=>'用户名不能为空',
            'uname.required'=>'昵称不能为空',
            'password.required'=>'密码不能为空',
            'sex.required'=>'性别不能为空',
            'email.required'=>'邮箱不能为空',
            'username.regex'=>'用户名由6~12位字母数字下划线组成',                 
            'uname.regex'=>'昵称长度为2~12位',             
            'password.regex'=>'密码由6~12位字母数字下划线组成',
            'email.email'=>'邮箱格式不正确',
            'repassword.same'=>'两次密码不一致',
            'res'=>$request
        ]
   		);
    	// dd($request);
    	// 获取信息
    	$res = $request->except('_token','repassword','readed','code');

    	$res['password'] = Hash::make($request->input('password'));
    	$res['status'] = '0';
    	$res['token'] = str_random(60);



    	$rs = DB::table('users')->insertGetId($res);
    	// dd($rs);
    	if($rs){

    		//发送邮件
        	$rs = Mail::send('home.email.emessage', ['id'=>$rs,'res'=>$res,'token'=>$res['token']], function ($msg) use ($res){
            		//从哪发的邮件
    	            $msg->from(env('MAIL_USERNAME'), '因你而乐');
    	            //发给谁的
    	            $msg->to($res['email'], $res['username'])->subject('欢迎注册我们的网站，请激活您的账号！');
    	    });
    	}

    	return view('home.email.remind',['request'=>$request,'title'=>'账号激活']);
    
    }

       public function jihuo(Request $request)
    {
        //获取id
        $id = $request->input('id');
        // dd($id);
        //通过id获取数据
        $res = DB::table('users')->where('uid','=',$id)->first();
        // dd($res->token);
        //获取token
        $token = $request->input('token');

        //对比token
        if($token != $res->token){

            abort(404);
        }

        $rs['status'] = '1';
        //把id这条数据的状态从 0 变成 1
        // dd($rs);
        $data = DB::table('users')->where('uid','=',$id)->update($rs);

        if($data){

            return redirect('/home/login');
        }

            return redirect('/');
}
}
