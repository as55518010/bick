<?php
namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;
use app\admin\controller\Comm ;


class Admin extends Comm
{  


    public function add()
    {   
        $admin=new AdminModel;
        if(request()->isPost()){
            $data=input('post.');

             $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            $data['password']=md5($data['password']);            
            $decide=$admin->save($data);

            if($decide){
                $this->success('添加管理員成功',url('list'));
            }else{
                $this->error('添加管理員失敗');
            }
           return;
        }
        
        
        return view();
    }

       public function edit()
    {   
        $data=input('id'); 
         $admin=new AdminModel;
        $editRes=$admin->find($data);
        if(request()->isPost()){
            $data=input('post.');
            $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
            if($data['password']){
            $data['password']=md5($data['password']);
            }else{
                $data['password']=$editRes['password'];
            }
            $validate=$admin->update($data);
            if($validate){
                $this->success('更新管理員成功',url('list'));
            }else{
                   $this->error('添加管理員失敗');
            }
        }
       
              
      
        $this->assign('editRes',$editRes);
        return view();
    }

       public function list()
    {   
        $admin=new AdminModel;
        $listRes=$admin->select();
        $this->assign('listRes',$listRes);
        return view();
    }

          public function del()
    {   
       
        $data=input('id');
       $del=AdminModel::destroy($data);
       if($del)
        {
            $this->success('刪除管理員成功',url('list'));
        }else{
               $this->error('刪除管理員失敗');
        }
    }




}
