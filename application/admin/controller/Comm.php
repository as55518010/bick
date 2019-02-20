<?php
namespace app\admin\controller;
use think\Controller;
use app\index\controller\Comm as indexComm;

class Comm extends Controller
{  
    public function _initialize()
    {
        if(!session('id')||!session('name')){
            $this->error('尚未登入',url('login/index'));
        }
        $index=new indexComm;
        $index->getConf();
  
    }

}
