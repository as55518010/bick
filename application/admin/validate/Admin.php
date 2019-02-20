<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate
{

    protected $rule=[
        'name'=>'unique:admin|require|max:25',
        'password'=>'require|min:6',
    ];


    protected $message=[
        'name.require'=>'管理員名稱不得為空！',
        'name.unique'=>'管理員名稱不得重複！',
        'password.require'=>'管理員密碼不得為空！',
        'password.min'=>'密碼不得少於6為！',
    ];

    protected $scene=[
        'add'=>['name','password'],
        'edit'=>['name','password'=>'min:6'],
    ];





    

    




   

    












}
