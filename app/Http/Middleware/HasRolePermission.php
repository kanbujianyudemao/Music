<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Admin\Rooter;
use App\Model\Admin\Role;
use App\Model\Admin\Permission;
class HasRolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
       
        // 获取当前访问的路由对应的控制器方法
        $action = \Route::current()->getAction()['controller'];

        //用户登录  获取用户信息
        $user = Rooter::find(session('rid'));

        //知道我有哪些角色 1 2 3 4

        $role = $user->roles;

        $arr = [];
        foreach($role as $rl){
            
            $per = $rl->permissions;

            foreach($per as $url){

               $arr[] = \Route::current()->getAction()['namespace'].'\\'.$url->per_url;
            }

        }
        //获取权限
        $arrs = array_unique($arr);

        //判断
        if(in_array($action,  $arrs)){

            return $next($request);
            
        } else {

            return redirect('/admin/error');
        }

    }
    
}