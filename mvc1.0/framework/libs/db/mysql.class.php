<?php 
class mysql{


	// the function of report error
	function err($error){
		//die 有两种作用 输出 和 停止 相当于echo 和 exit 的结合
		die("对不起，您的操作有误，原因为： ".$error);

	}
     
    //连接数据库
    /*
    @param string $config配置数组
    array($dbhost , $dbuser, $dbqsw, $dbname , $dbcharset)
    @return bool 连接成功或不成功

    */

    function connect($config){
    	extract($config);//该函数将数组还原成变量
    	if(!($con = mysql_connect($dbhost,$dbuser,$dbpsw))){
    		//mysql_connet 连接数据库
    		$this->err(mysql_errno());
    	}
    	if(!mysql_select_db($dbname,$con)){
    		//mysql_select_db 选择库的函数
    		$this->err(mysql_errno());
    	}
    	mysql_query("set names".$dbcharset);
    	//使用mysql_query 设置编码 格式 ： mysql_query("set names utf8")
    }

    /*执行sql语句
    @param atring $sql
    @return bool返回执行成功，资源或执行失败

    */


    function query($sql){
    	if(!($query = mysql_query($sql))){
    		//使用mysql_query函数执行sql语句
    		$this->err($sql."<br>".mysql_error());
    		//mysql_error报错
    	}
    	else{
    		return $query;
    	}
    }


    /*

    指定行的指定字段的值


    @param source $query sql语句通过mysql_query 执行出来的资源
    @return array 返回列表数组*/

    function findAll($query){
    	while($rs = mysql_fetch_array($query, MYSQL_ASSOC)){
    		//mysql_fetch_array函数把资源转换为数组，一次转换出一行出来
    		$list[] = $rs;
    	}
    	return isset($list)?$list:"";
    }

      /*

    指定行的指定字段的值


    @param source $query sql语句通过mysql_query 执行出来的资源
    @return array 返回单条信息数组*/

    function findOne($query){
    	$rs = mysql_fetch_array($query, MYSQL_ASSOC);
    	return $rs;
    }


      /*

    指定行的指定字段的值


    @param source $query sql语句通过mysql_query 执行出来的资源
    @return array 返回指定行指定字段的值*/

   function findResult($query, $row = 0,$filed = 0){
    	$rs = mysql_result($query, $row,$filed);
    	return $rs;
    }
/*
    function findResult($query,$row = 0,$filed = 0){
    	$rs = mysql_result($query,  $row, $filed);
    	return $rs;
    }*/

/*	function findResult($query, $row = 0, $filed = 0){
		$rs = mysql_result($query,  $row, $filed);
		return $rs;
	}*/

    /*
    添加函数
    @param string $table 表名
    @param array $arr 添加数组（包含字段和值的一维数组）
    */

    function insert($table,$arr){
    	//$sql = "insert into 表名（多个字段）values 多个值 "
    	//紧接着执行这个语句 
    	//mysql_query($sql)
    	/*

    	$sql = "insert into test(a,b,c)values(1,5,3)";
 
        封装一个数组
    	$arr = array(
    	'a'=>1,
    	'b'=>5,
    	'c'=>3,)

    	*/

    	foreach ($arr as $key => $value) {//foreach循环数组
    		$value = mysql_real_escape_string($value);
    		$keyArr[] = "`".$key."`";//把arr数组的键名保存到$keyarr数组当中
    		$valueArr[] = "'".$value."'";//把$arr数组当中的键值保存到$valueArr当中，因为值多为字符串，而sql语句中insert里面如果值是字符串的话要加单引号，所以这个地方要加单引号

    		# code...
    	}

    	$keys = implode(",", $keyArr);//implode函数是把数组组合成字符串
    	//implode(分隔符，数组)
    	$values = implode(",", "$valueArr");
    	$sql = "insert into ".$table."(".$keys.") values (".$values.")";
    	$this->query($sql);//调用自身的query（执行）方法执行这条sql语句
    	                   //$this 指代自身
    	return mysql_insert_id();//返回刚才插入的主键的值

    }

    /*
    修改函数*/

    function update($table,$arr,$where){
    	foreach ($arr as $key => $value) {
    		$value = mysql_real_escape_string($value);
    		$keyAndvalueArr[] = "`".$key."`='".$value."'";

    		/*
    		array(
    		'字段=字段值'，
    		'字段1=字段值1'，
    		'字段2=字段值2')*/
    		# code...

    		$keyAndvalueArr = implode(",", "$keyAndvalueArr");
    		$sql = "update".$table."set".$keyAndvalueArr."where".$where;
    		$this->query($sql);
    	}
    }

    /*删除函数*/
    function del($table,$where){
    	$sql = "delete from".$table."where".$where;
    	$this->query($sql);
    }




}

 ?>