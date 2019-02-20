<?php
namespace app\index\controller;

class Search extends Comm
{
    public function index()
    {	
    	$kwtype=input('q');

    	$data=db('article')->where('title','like','%'.$kwtype.'%')->order('id desc')->paginate(2,false,$config=['query'=>array('q'=>$kwtype)]);

    	$hot=db('article')->limit(5)->order('click desc')->select();
    	$this->assign(array(    	
            'hot'=>$hot,
            'data'=>$data,
            'kwtype'=>$kwtype,
    	));   	
        return view('search');
    }
}
