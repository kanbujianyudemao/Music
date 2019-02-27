<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Rooter extends Model
{
    //
     protected $table = 'rooter';

    //主键
    protected $primaryKey = 'rid';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
	 * 不可被批量赋值的属性。
	 *
	 * @var array
	 */
	protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany('App\Model\Admin\Role','user_role','user_id','role_id');
    }
}
