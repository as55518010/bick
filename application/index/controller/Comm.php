<?php
namespace app\index\controller;
use think\Controller;
class Comm extends Controller
{

    public function _initialize(){
     $date=input('cateid');
     $arr=$this->getparents($date);

      if($date){

        $sot=$this->sort($date);
        $data=db('article')->where('cateid','in',$sot)->paginate(3);
        $hot=db('article')->limit(5)->where('cateid','in',$sot)->order('click desc')->select();
        $this->assign(
          array(
              'data'=>$data,
              'hot'=>$hot,
          ));

      }
     
        //網站配置項
        $this->getConf();
       $cateres=$this->make_tree();

      $this->assign(array(
        'cateres'=>$cateres,
        'arr'=>$arr,

      ));
    }

        public function getConf(){

        $conf=new \app\index\model\Conf();
        $_confres=$conf->getAllConf(); 
        $confres=array();
        foreach ($_confres as $k => $v) {
            
            if($v['values']){
                $confres[$v['enname']]['values']=$v['values'];
                $confres[$v['enname']]['value']=$v['value'];
            }
            $confres[$v['enname']]['value']=$v['value'];
        }
        // print_r($confres);die;
        $this->assign('confres',$confres);
    }

 
 public function getparents($cateid){
        $cateres=db('cate')->field('id,pid,catename')->select();
        $cates=db('cate')->field('id,pid,catename')->find($cateid);
        $pid=$cates['pid'];
        if($pid){
            $arr=$this->_getparentsid($cateres,$pid);
        }
        $arr[]=$cates;
        return $arr;
    }

    public function _getparentsid($cateres,$pid){
        static $arr=array();
        foreach ($cateres as $k => $v) {
            if($v['id'] == $pid){
                $arr[]=$v;
                $this->_getparentsid($cateres,$v['pid']);
            }
        }

        return $arr;
    }

     public function sort($cateid){
        $cateres=db('cate')->order('sort')->field('id,pid,catename')->select();
        $arr=$this->_sort($cateres,$cateid);
        $arr[]=$cateid;
        
        
        return $arr;
    }

    public function _sort($cateres,$id){
        static $arr=array();
        foreach ($cateres as $k => $v) {
            if($v['pid'] == $id){
                $arr[]=$v['id'];
                $this->_getparentsid($cateres,$v['id']);
            }
        }

        return $arr;
    }

    public function make_tree(){
      $cateres=db('cate')->order('sort')->select();
      $tree=$this->_make_tree($cateres);
      return $tree;

    }

    //生成無限極分類樹  
function _make_tree($arr){  
    $refer = array();  
    $tree = array();

    foreach($arr as $k => $v){  
        $refer[$v['id']] = & $arr[$k];  //創建主鍵的數組引用  

    }   
    foreach($arr as $k => $v){  
        $pid = $v['pid'];   //獲取當前分類的父級id  

        if($pid == 0){  
            $tree[] = & $arr[$k];   //頂級欄目  
        }else{  
            if(isset($refer[$pid])){  

                $refer[$pid]['subcat'][] = & $arr[$k];  //如果存在父級欄目，則添加進父級欄目的子欄目數組中 
                
            }  
        }  
    }  
     
    return $tree;  
}  


}
