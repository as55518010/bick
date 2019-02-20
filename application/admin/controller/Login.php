<?php
namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;
use think\Controller;
class Login extends Controller
{
    public function index()
    {   
        if(request()->isPost()){
        $this->check(input('code'));
        $user=input('post.');
        $adminModel=new AdminModel;
        $admin=$adminModel->login($user);
            if($admin==='1'){
                $this->error('用戶名不存在');
            }
            if($admin==='2'){
                $this->error('密碼錯誤');
            }
            if($admin==='3'){

                $this->success('登入成功',url('index/index'));

            }
        }       
        
        return view('login');
    }


    // 驗證碼檢測
    public function check($code='')
    {
        if (!captcha_check($code)) {
            $this->error('驗證碼錯誤');
        } else {
            return true;
        }
    }
    
    
    public function logout(){
        session(null);
        $this->success('退出系統成功',url('index'));
    }
}
