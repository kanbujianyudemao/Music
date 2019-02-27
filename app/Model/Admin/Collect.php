<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    //
     //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'collect';
    
    // 主键
    protected $primaryKey = 'cid';

    /**
	 * 不可被批量赋值的属性。
	 *
	 * @var array
	 */
	protected $guarded = [];

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(App\Model\Admin\User::class,'uid');
    }
}
