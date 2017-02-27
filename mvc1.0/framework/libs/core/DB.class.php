<?php 
class DB{//类名在php里面是一个全局变量 DB：：$db DB::方法（）； 	

	public static $db;//保存实例化后的对象

/*	public static function init($dbtype,$config)
	{
		self::$db = new $dbtype;
		self::$db->connect($config);
	}*/

		public static function init($dbtype, $config) {
		self::$db = new $dbtype;
		self::$db->connect($config);
	}


/*	public static function query($sql){
		return self::$db->query($sql);
	}*/

		public static function query($sql){
		return self::$db->query($sql);
	}


/*	public static function findAll($sql){
		return self::$db->query($sql);
		return self::$db->findAll($query);
	}*/
		public static function findAll($sql){
		$query = self::$db->query($sql);
		return self::$db->findAll($query);
	}

	public static function findOne($sql){
		$query = self::$db->query($sql);
		return self::$db->findOne($query);
	}

/*	public static function findOne($sql){
		$query = self::$db->query($sql);
		return self::$db->findOne($query);
	}*/

	public static function findResult($sql,$row = 0,$filed = 0){
		$query = self::$db->query($sql);
		return self::$db->findResult($query,$row,$filed);
	}

	public static function update($table,$arr,$where){
		return self::$db->update($tbl,$arr,$where);

	}	

	public static function del($table,$where){
		return self::$db->del($table,$where);

	}

	} ?>