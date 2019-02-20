<?php
namespace app\index\controller;

class Article extends Comm
{
    public function index()
    {	
    	$post=input('id');
        //點擊量
        db('article')->where('id',$post)->setInc('click');
        
    	$articleRes=db('article')->find($post);
    	$hot=db('article')->limit(5)->order('click desc')->select();
    	$this->assign(array(
    		'articleRes'=>$articleRes,
    		'hot'=>$hot,
    	));

        return view('article');
    }
}
