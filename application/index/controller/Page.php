<?php
namespace app\index\controller;

class Page extends Comm
{
    public function index()
    {	
        $data=db('cate')->find(input('cateid'));
       $this->assign('data',$data);
        return view('page');
    }
}
