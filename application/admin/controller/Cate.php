<?php
namespace app\admin\controller;
use app\admin\model\Cate as CateModel;
use app\admin\controller\Comm ;

class Cate extends Comm
{  


    public function add()
    {   
        $cate=new CateModel;
        if(request()->isPost()){
            $data=input('post.');
             $validate = \think\Loader::validate('Cate');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            $add=$cate->save($data);
            if($add){
                $this->success('欄目添加成功',url('list'));
            }else{
                $this->error('欄目添加失敗');
            }
        }
        $addRes=$cate->level();
        $this->assign('addRes',$addRes);
        return view();
    }

       public function edit()
    {   
         $cate=new CateModel;
        if(request()->isPost()){
            $data=input('post.');
            $validate = \think\Loader::validate('Cate');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
            $validate=$cate->update($data);
            if($validate){
                $this->success('更新欄目成功',url('list'));
            }else{
                   $this->error('更新欄目成功');
            }
        }
       
        $data=input('id');       
        $levelRes=$cate->level();
        $editRes=$cate->find($data);
        $this->assign(array(
            'levelRes'=>$levelRes,
            'editRes'=>$editRes,
        ));
        return view();
    }

       public function list()
    {   
       $cate=new CateModel;
        if(request()->isPost()){
            $sorts=input('post.');
            foreach ($sorts as $k => $v) {
                $cate->update(['id'=>$k,'sort'=>$v]);
            }
            $this->success('更新排序成功！',url('list'));
            return;
        }
        
        $listRes=$cate->level();

        $this->assign('listRes',$listRes);

        return view();
    }

          public function del()
    {   
        $cate=new CateModel;
       
        $data=input('id');
        $delRes=implode(',',$cate->ed($data));

       $del=db('cate')->where('id','in',$delRes)->delete();

       if($del)
        {   
            db('article')->where('cateid','in',$delRes)->delete();
            $this->success('刪除欄目成功',url('list'));            
        }else{
               $this->error('刪除欄目失敗');
        }
    }

}
