<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
        $this->display("index");
    }
    public function login() {
        $this->display("login");
    }
    public function upload() {
        $upload = new \Think\Upload();
        $upload->maxSize = 1024*1024*1024*1024;
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'mpg', 'mpeg', 'avi', 'rm', 'rmvb', 'mov', 'wmv', 'asf', 'dat', 'qlv');
        $upload->savePath = "../upload/";
        $info = $upload->upload();
        if(!$info) {//  上传错误提示错误信息
            $this->error($upload->getError());
        }else{//  上传成功
            $this->success(' 上传成功！');
        }
    }
    public function loginsuccess() {
        $username = cookie("username");
        $this->assign("coo",cookie($username."uniqid"))->assign("username",$username);
        $this->display("success");
    }
    public function checklogin() {
        if (!empty($_POST)) {
            $model = M("user");
            $username = I("post.username");
            $userpass = I("post.userpass");
            $ret = $model->where("username='$username' AND userpass='$userpass'")->select();
            if ($ret) {
                if (!cookie($username . "uniqid") && $ret[0]["userstate"] == 0 || !cookie($username . "uniqid") && $ret[0]["userstate"] == 1 || cookie($username . "uniqid") && cookie($username . "uniqid") != $ret["useruniqid"] && $ret[0]["userstate"] == 1) {
                    $uniqid = $username . md5(uniqid(mt_rand(), 1));
                    cookie("username", $username);
                    cookie($username . "uniqid", $uniqid);
                    $data["userstate"] = 1;
                    $data["useruniqid"] = cookie($username . "uniqid");
                    $ret = $model->data($data)->where("username='$username'")->save();
                    if ($ret) {
                        $this->success("登录成功！", "/jiaoyu/index.php/Index/loginsuccess");
                    } else {
                        $this->error("登录失败！","/jiaoyu/index.php/Index/login");
                    }
                }
            } else {
                $this->error("用户名或密码错误！", "/jiaoyu/index.php/Index/login");
            }
        }
    }
}