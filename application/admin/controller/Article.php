<?php
namespace app\admin\controller;
use app\admin\controller\Comm ;
use app\admin\model\Cate as CateModel;

class Article extends Comm
{

    public function add()
    {    
            $cate=new CateModel;
         if(request()->isPost()){
            $data=input('post.');
            $validate = \think\Loader::validate('Article');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            $data['time']=time();
            $file = request()->file('thumb');
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'); 
                if($info){
                       $thumb='/' . 'public' . DS . 'uploads'.'/'.$info->getSaveName();
                        $data['thumb']=$thumb;
                }         
            }

            $add=db('article')->insert($data);
            if($add){
                $this->success('文章添加成功',url('list'));
            }else{
                $this->error('文章添加失敗');
            }

         }
        $cateres=$cate->level();
        $this->assign('cateres',$cateres);
        return view();
    }


       public function edit()
    {   
        $cate=new CateModel;

        $data=input('id');
        $editRes=db('article')->find($data);        
        if(request()->isPost()){
            $post=input('post.');
            $validate = \think\Loader::validate('Article');
            if(!$validate->scene('edit')->check($post)){
                $this->error($validate->getError());
            }
            $file = request()->file('thumb');
            if($file){               
                 //利用server查詢你的絕對路徑
                $thumbPath=$_SERVER['DOCUMENT_ROOT'].$editRes['thumb'];
                    if($editRes['thumb']){
                    unlink($thumbPath);

                    }              
           
            
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'); 
                if($info){
                        $thumb='/' . 'public' . DS . 'uploads'.'/'.$info->getSaveName();
                        $post['thumb']=$thumb;
                }         
            }

            $re=db('article')->update($post);
            if($re){
                $this->success('文章添加成功',url('list'));
            }else{
                $this->error('並未修改文章');
            }

        }
         $cateres=$cate->level();      
        $this->assign(array(
            'editRes'=>$editRes,
            'cateres'=>$cateres,

        ));
        return view();
    }


       public function list()
    {
       
        $listRes=db('article')->alias('a')->field('a.*,b.catename')->order('a.id desc')->join('bk_cate b','b.id= a.cateid')->paginate(8);
        $this->assign('listRes',$listRes);
        return view();
    }

    public function del(){
        $data=input('id');
        $arts=db('article')->find($data);
        $thumbPath=$_SERVER['DOCUMENT_ROOT'].$arts['thumb'];

        if(file_exists($thumbPath)){
       
        unlink($thumbPath);

        }              


        $de=db('article')->where('id',$data)->delete();

        if($de){
               $this->success('文章刪除成功',url('list'));
            }else{
                $this->error('並未刪除文章');
            }


    }

}
