<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;

Route::get('', "index/index/index");
Route::miss("index/index/error404");


// Api
Route::group("api", function () {
    //用户增删改查
    Route::post('user/save', "api/user/save");
    Route::delete('user/delete', "api/user/delete");
    Route::put('user/update', "api/user/update");
    Route::get('user/index', "api/user/index");
});





