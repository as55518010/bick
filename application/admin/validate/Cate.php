<?php
namespace app\admin\validate;
use think\Validate;
class Cate extends Validate
{

    protected $rule=[
        'catename'=>'unique:cate|require|max:25',
    ];


    protected $message=[
        'catename.require'=>'欄目名稱不得為空！',
        'catename.unique'=>'欄目名稱不得重複！',
    ];

    protected $scene=[
        'add'=>['catename'],
        'edit'=>['catename'],
    ];





    

    




   

    












}
