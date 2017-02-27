<?php 
class authModel{
	private $auth = '';//当前管理员信息


	public function loginsubmit(){
	//进行登陆验证的一系列业务逻辑
		
		if(empty($_POST['username'])||empty($_POST['password'])){
			return false;
		}

		$username = addslashes($_POST['username']);
		$password = addslashes($_POST['password']);
		//用户的验证操作
		if($this->auth=$this->checkuser($username,$password)){
			$_SESSION['auth']=$this->auth;//用seesion 保存该用户信息
			return true;
		}else{
			return false;
		}
	
	}

	private function checkuser($username,$password){
		$adminobj = M('admin');
		$auth = $adminobj->findOne_by_username($username);
		if((!empty($auth))&&$auth['password']==$password){
			return $auth;
		}else{
			return false;
		}
	}

    public function __construct(){
    	if(isset($_SESSION['auth'])&&(!empty($_SESSION['auth']))){
    		$this->auth = $_SESSION['auth'];
    	}
    }

	public function getauth(){
		return $this->auth;
	}

	public function logout(){
		unset($_SESSION['auth']);
		$this->auth='';
	}


} 

 ?>