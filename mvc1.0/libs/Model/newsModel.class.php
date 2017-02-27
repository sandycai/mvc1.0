<?php 
class newsModel{


	public $_table = 'news';


	function count(){
		$sql = 'select count(*) from '.$this->_table;
		return DB::findResult($sql, 0, 0);
	}

	} ?>