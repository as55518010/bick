<?php
namespace app\admin\controller;
use app\admin\model\Conf as ConfModel;
use app\admin\controller\Comm ;
class Conf extends Comm
{

    public function lst(){
        if(request()->isPost()){
            $sorts=input('post.');
            $conf=new ConfModel();
            foreach ($sorts as $k => $v) {
                $conf->update(['id'=>$k,'sort'=>$v]);
            }
            $this->success('更新排序成功！',url('lst'));
            return;
        }
        $confres=ConfModel::order('sort desc')->paginate(4);
        $this->assign('conf',$confres);
        return view();
    }

    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            $validate = \think\Loader::validate('Conf');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $conf=new ConfModel();
            if($conf->save($data)){
                $this->success('添加配置成功！',url('lst'));
            }else{
                $this->error('添加配置失敗！');
            }
        }
        return view();
    }

    public function edit(){
        if(request()->isPost()){
            $data=input('post.');

            $validate = \think\Loader::validate('Conf');
               
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
            $conf=new ConfModel();
            $save=$conf->save($data,['id'=>$data['id']]);
            if($save!==false){
                $this->success('修改配置成功！',url('lst'));
            }else{
                $this->error('修改配置失敗！');
            }
        }
        $confs=ConfModel::find(input('id'));
        $this->assign('confs',$confs);
        return view();
    }

    public function del(){
        $del=ConfModel::destroy(input('id'));
        if($del){
           $this->success('刪除配置項成功！',url('lst')); 
        }else{
            $this->error('刪除配置項失敗！');
        }
    }

    public function conf(){
       
        if(request()->isPost()){
            $data=input('post.');
            $file=array();
            foreach ($data as $k => $v) {

            
                if($sd=request()->file($k)){
                   
                    $file=request()->file($k);
                    
                    $editRes=db('conf')->where('enname',$k)->find();  
                     //利用server查詢你的絕對路徑
                    $thumbPath=$_SERVER['DOCUMENT_ROOT'].$editRes['values'];
                        if($editRes['values']){
                        unlink($thumbPath);

                        }              
               
                
                    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'); 

                    if($info){
                        var_dump($info);
                            $thumb='/' . 'public' . DS . 'uploads'.'/'.$info->getSaveName();
                            
                             $re=db('conf')->where('enname',$k)->update(['values'=>$thumb,'value'=>$data[$k]]);
                             unset($data[$k]);
                             } 
                  }elseif($data){
                        ConfModel::where('enname',$k)->update(['value'=>$v]);
                  }else{
                        return;
                  }                   
                }
                $this->success('修改配置成功！');
                  }
                    $confres=ConfModel::order('sort desc')->select();
                    $this->assign('conf',$confres);
                    return view();
                }

}
