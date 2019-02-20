<?php
namespace app\admin\model;
use think\Model;
class Admin extends Model
{
     public function login($data){
        $user=Admin::getByName($data['name']);

        if(!$user){
        	return '1';
        }else if($user['password']!== md5($data['password'])){
        	return '2';
        }else{
        	session('id',$user['id']);
        	session('name',$user['name']);
        	return '3';
        }



    }
}
