<?php
namespace app\admin\validate;
use think\Validate;
class Link extends Validate
{

    protected $rule=[
        'title'=>'unique:link|require|max:25',
        // 'url'=>'url|unique:link|require|max:60',
        'desc'=>'require',
    ];


    protected $message=[
        'title.require'=>'鏈接標題不得為空！',
        'title.unique'=>'鏈接標題不得重複！',
        // 'url.unique'=>'鏈接地址不得重複！',
        // 'url.require'=>'鏈接地址不得為空！',
        // 'url.url'=>'鏈接地址格式不正確！',
        // 'url.max'=>'鏈接地址不得大於60個字符！',
        'title.max'=>'鏈接標題長度大的大於25個字符！',
        'desc.require'=>'鏈接描述不得為空！',
    ];

    protected $scene=[
        'add'=>['title','url','desc'],
        'edit'=>['title','url'],
    ];





    

    




   

    












}
