<?php 
class adminController{
/*	function test(){
		//控制器的作用是调用模型,并调用视图.将模型产生的数据传递给视图.并让相关视图去显示
		echo "hello";

	}*/

public $auth='';

public function __construct(){
		//判断当前是否已经登陆
		//如果不是登陆页，而且没有登陆，就要跳转到登陆页
	$authobj = M('auth');
	$this->auth = $authobj->getauth();
	if(empty($this->auth)&&(PC::$method!='login')){
		$this->showmessage('请登录后再操作！',
			'admin.php?controller=admin&method=login');
	}
	}

public function index(){
	$newsobj = M('news');
	$newsnum = $newsobj->count();
	VIEW::assign(array('newsnum'=>$newsnum));
	VIEW::display('admin/index.html');		
}


public function login(){
	if($_POST){
		//进行登陆处理
		//登陆处理业务逻辑放在admin auth
		//admin同表名的模型：从数据库里取出用户信息
		//auth模型：进行用户信息的核对
		$this->checklogin();

	}
     else{
          VIEW::display('admin/login.html');//显示登陆页面
    }

}

public function logout(){
	$authobj = M('auth');
	$authobj->logout();
	$this->showmessage('退出成功！','admin.php?controller=admin&method=login');
}


     private function checklogin(){
	       $authobj = M('auth');
	       if($authobj->loginsubmit()){
		   $this->showmessage('登陆成功','admin.php?controller=admin&method=index');
	       }else{
		   $this->showmessage('登陆失败','admin.php?controller=admin&method=login');
	}
}

		private function showmessage($info, $url){
			echo "<script>alert('$info');window.location.href='$url'</script>";
			exit;
		}






} 


 ?>