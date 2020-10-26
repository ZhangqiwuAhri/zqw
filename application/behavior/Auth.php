<?php
/**
 * Created by PhpStorm.
 * User: ahri
 * Date: 2020/10/26
 * Time: 17:58
 */

namespace app\behavior;


use think\Controller;
use think\Exception;
use think\Session;


class Auth extends Controller
{
    //不需要权限权限验证的路由
    protected $exclude = [
      "/"
    ];


    //需要登录才能访问的路由
    protected $login = [

    ];


    //不需要检测的模块
    protected $exclude_moudel = ['api','index'];


    public function run()
    {


        // 行为逻辑
        try {
            // 获取当前访问路由
            $url  = $this->getActionUrl();



            if(empty(Session::get()) && in_array($url,$this->login)&&!in_array(\request()->module(),$this->exclude_moudel)){
                $this->error('请先登录','/admin/login');
            }

            // 用户所拥有的权限路由
            $auth = Session::get('auth.url') ? Session::get('auth.url'): [];

            if(!in_array($url, $auth) && !in_array($url, $this->exclude)&& !in_array(\request()->module(), $this->exclude_moudel)){
                $this->error('无权限访问');
            }


        } catch (Exception $ex) {
              print_r($ex);
        }


    }

    /**
     * 获取当前访问路由
     * @param $Request
     * @return string
     */
    private function getActionUrl()
    {
        $module     = request()->module();
        $controller = request()->controller();
        $action     = request()->action();
        $url        = $module.'/'.$controller.'/'.$action;
        return strtolower($url);
    }

}