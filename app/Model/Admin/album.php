<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class album extends Model 
{
     protected $table = 'album';
    
    // 主键
    protected $primaryKey = 'aid';

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

}
