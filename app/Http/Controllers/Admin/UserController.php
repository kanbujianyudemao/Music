<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\User;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $rs = DB::table('users')
        ->where( function ($query)use($request) {
            $uname = $request->input('uname');
            $email = $request->input('email');
            // echo $email;die;
            // 如果用户名不为空
            if(!empty($uname)){
                $query->where('uname', 'like', '%'.$uname.'%');
            }

            // 如果邮箱不为空
            if(!empty($email)){
                $query->where('email', 'like', '%'.$email.'%');
            }

            })
        ->orderBy('vip','desc')->paginate($request->input('num', 10));
        $num = $request->num;
        // $rs = User::orderBy('vip','desc')->get();
        // dump($rs);die;
        // return  1;
        return view('admin/user/index',[
            'title'=>'用户浏览',
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
        //
        return view('admin/add',['title'=>'用户添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //保存数据

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
