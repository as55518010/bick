<?php
namespace app\index\controller;
use app\index\controller\Comm ;
class Index extends Comm
{
    public function index()
    {
    	//最新文章
    	$data=db('article')->limit(5)->order('id desc')->select();
    	//推薦文章
    	$good=db('article')->limit(4)->where('rec',1)->order('id desc')->select();
    	//超級連接
    	$link=db('link')->order('id desc')->select();
        // 獲取熱門文章
        $hot=db('article')->limit(5)->order('click desc')->select();
        //獲取推薦到首頁
        $index=db('cate')->where('rec_index',1)->select();
        //獲取推薦到底部
        $bottom=db('cate')->where('rec_bottom',1)->select();
    	$this->assign(array(
    		'data'=>$data,
    		'good'=>$good,
    		'link'=>$link,
            'hot'=>$hot,
            'index'=>$index,
            'bottom'=>$bottom,
    	));
        return view();
    }
}
