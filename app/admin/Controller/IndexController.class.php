<?php
namespace admin\Controller;
use Think\Controller;
use Think\Think;

class IndexController extends Controller {
    public function index(){

    }
    public function upload() {
        $upload = new \Think\Upload();
        $upload->maxSize = 3145728;
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
        $upload->savePath = "../upload/";
        $info = $upload->upload();
        if(!$info) {//  上传错误提示错误信息
            $this->error($upload->getError());
        }else{//  上传成功
            $this->success(' 上传成功！ ');
        }
    }
}