<?php
namespace app\admin\validate;
use think\Validate;
class Article extends Validate
{

    protected $rule=[
        'title'=>'unique:article|require',
        'cateid'=>'require',
        'content'=>'require',
    ];


    protected $message=[
        'title.require'=>'文章標題不得為空！',
        'title.unique'=>'文章標題不得重複！',
        // 'title.max'=>'文章標題長度大的大於25個字符！',
        'cateid.require'=>'文章所屬欄目不得為空！',
        'content.require'=>'文章內容不得為空！',
    ];

    protected $scene=[
        'add'=>['title','cateid','content'],
        'edit'=>['title','cateid'],
    ];





    

    




   

    












}
