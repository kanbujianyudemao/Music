<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Hash;
use App\Model\Admin\Rooter;
use App\Model\Admin\Role;
use Config;
use DB;
class RooterController extends Controller
{   



    public function user_role($id)
    {
        // echo $id;
        //通过id 获取用户信息
        $user = Rooter::find($id);

        //获取角色信息
        $role = Role::get();

        //获取当前用户的角色id
        //第一种方式
        $res = DB::table('user_role')->where('user_id',$id)->pluck('role_id')->toArray();

        return view('admin.rooter.user_role',[

            'title'=>'用户添加角色页面',
            'user'=>$user,
            'role'=>$role,
            'res'=>$res
        ]);
    }


    public function do_user_role(Request $request)
    {
        $user_id = $request->input('id');

        $role_id = $request->input('role_id');

        //判断
        if(!$role_id){

            return back()->with('error','请选择角色');
        }

        //添加数据 $role_id  [1,2,3];
        DB::table('user_role')->where('user_id',$user_id)->delete();

        $arr = [];
        foreach($role_id as $k => $v){
            $res = [];
            $res['user_id'] = $user_id;
            $res['role_id'] = $v;
            $arr[] = $res;
        }

        $data = DB::table('user_role')->insert($arr);

        if($data){

            return redirect('/admin/rooter')->with('success','添加成功');
        } else {

            return back()->with('error','添加失败');
        }


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $rs = Rooter::orderBy('rid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $rname = $request->input('rname');
                
                //如果用户名不为空
                if(!empty($rname)) {
                    $query->where('rname','like','%'.$rname.'%');
                }
                
            })
            ->paginate($request->input('num', 5));
        //获取数据
        
        // dd($rs);
        return view('admin.rooter.index',['rs'=>$rs,'request'=>$request,'title'=>'管理员信息']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rooter.add',['title'=>'管理员添加页面']);
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
            'username' => 'required|regex:/^\w{6,12}$/',
            'password' => 'required|regex:/^\S{6,12}$/',
            'repass' =>'same:password',
            'rname' =>'required|regex:/^\w{4,10}$/',
            'email' =>'email:email',


        ],[
            'username.required'=>'管理员账号不能为空',
            'password.required'=>'密码不能为空',
            'username.regex'=>'管理员账号格式不正确',
            'password.regex'=>'密码格式不正确',
            'repass.same'=>'两次密码不一致',
            'rname.required' => '管理员名称不能为空',
            'rname.regex' => '管理员名称格式不正确',
            'email.email'=>'邮箱格式不正确',
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
        }

        $res['photo'] = '/uploads/'.$name.'.'.$suffix;
        $res['password'] = Hash::make($request->input('password'));

        //往数据库中添加数据
        $rs = Rooter::create($res);

        if($rs){

            //跳转
            return redirect('admin/rooter');
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


        
        //根据rid查询
        $rs = rooter::where('rid',$id)->first();
        // dd($rs);
        return view('admin.rooter.edit',['rs'=>$rs,'title'=>'管理员修改页面']);
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
            'username' => 'required|regex:/^\w{6,12}$/',
            'rname' =>'required|regex:/^\w{4,10}$/',
            'email' =>'email:email',


        ],[
            'username.required'=>'管理员账号不能为空',
            'username.regex'=>'管理员账号格式不正确',
            'rname.required' => '管理员名称不能为空',
            'rname.regex' => '管理员名称格式不正确',
            'email.email'=>'邮箱格式不正确',
            ]
        );
        
        

        $res = $request->except('_token','_method','photo','repass');

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
        // $res['password'] = Hash::make($request->input('password'));
        // dd($rs);

        try{
           
            $rs = Rooter::where('rid',$id)->update($res);


            if($rs){

                return redirect('/admin/rooter')->with('success','修改成功');
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


        $info = Rooter::find($id);

        $path = $info->photo;

        $data = unlink('.'.$path);

        try{
           
            $res = Rooter::where('rid',$id)->delete();

            if($res){

                return redirect('/admin/rooter')->with('success','删除成功');
            }
        }catch(\Exception $e){

            return back()->with('error','删除失败');

        }
    }

    public function photo(Request $request)
    {


        
        //获取上传的文件对象
        $file = $request->file('photo');
        //判断文件是否有效
        if($file->isValid()){
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名

            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;

            $path = $file->move(Config::get('app.uploads'),$newName);

            $filepath = '/uploads/'.$newName;
            //返回文件的路径
            return  $filepath;
        }
    }
}
