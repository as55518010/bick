<?php
namespace app\admin\model;
use think\Model;
class Cate extends Model
{
  //無線級分類
  public function level($id=0){
  	$list = $this->all();
  	$data=$this->sort($list,$id);
  	return $data;

  }
  public function sort($list,$id=0,$level=0){
  	static $date=array();
  	
  	
  	foreach ($list as $k => $v) {

  		if($id==$v['pid']){

  			// dump($v['id']);die;
  			$v['level']=$level;
  			$date[]=$v;
  			$this->sort($list,$v['id'],$level+1);
  		}
  	}
  	 return $date;
  }


   public function ed($id=0){
    $list = $this->all();
    $data=$this->_ed($list,$id);
    $data[]=$id;
    return $data;

  }
  public function _ed($list,$id=0,$level=0){
    static $date=array();
    
    
    foreach ($list as $k => $v) {

      if($id==$v['pid']){

        // dump($v['id']);die;
        $date[]=$v['id'];
        $this->_ed($list,$v['id']);
      }
    }
     return $date;
  }
  
 
}
