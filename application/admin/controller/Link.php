<?php
namespace app\admin\controller;
use app\admin\model\Link as LinkModel;
use app\admin\controller\Comm ;

class Link extends Comm
{  


    public function add()
    {   
        $cate=new LinkModel;
        if(request()->isPost()){
            $data=input('post.');
             $validate = \think\Loader::validate('Link');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            $add=$cate->save($data);
            if($add){
                $this->success('鏈接添加成功',url('list'));
            }else{
                $this->error('鏈接添加失敗');
            }
        }
        return view();
    }

       public function edit()
    {   
         $cate=new LinkModel;
        if(request()->isPost()){
            $data=input('post.');
              $validate = \think\Loader::validate('Link');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
            $validate=$cate->update($data);
            if($validate){
                $this->success('更新管理員成功',url('list'));
            }else{
                   $this->error('添加管理員失敗');
            }
        }
       
        $data=input('id');  
        $editRes=$cate->find($data);
        $this->assign(array(            
            'editRes'=>$editRes,
        ));
        return view();
    }

       public function list()
    {   

        $cate=new LinkModel;
        $listRes=$cate->paginate(8);
        $this->assign('listRes',$listRes);
        return view();
    }

          public function del()
    {   
       
        $data=input('id');
       $del=LinkModel::destroy($data);
       if($del)
        {
            $this->success('刪除管理員成功',url('list'));
        }else{
               $this->error('刪除管理員失敗');
        }
    }

}
