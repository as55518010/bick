<?php
namespace app\index\controller;

class Artlist extends Comm
{
    public function index()
    {	    	
    	$caraid=input('cateid');
    	 $cate=db('cate')->find($caraid);
    	$this->assign(array(
        'cate'=>$cate,
      ));
        return view('artlist');
    }
}
