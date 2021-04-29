<?php
class QueryBuilder{
    public function insert($table,$names,$values){	
		$names=implode(',',$names);
		$values=implode(',',$values);
		$qry="INSERT INTO {$table} ({$names}) VALUES ({$values})";
		$result=mysqli_query($GLOBALS['conn'],$qry);
		return ($GLOBALS['conn']->insert_id);
	}	

    public function fetchOne($table,$names,$values){
		$names=implode(',',$names);
		$values=implode(',',$values);
		$qry="SELECT * FROM {$table} WHERE {$names} = '{$values}'";
		$result=mysqli_query($GLOBALS['conn'],$qry);
		if($result)
			return (mysqli_fetch_assoc($result));
		else
			return NULL;
	}
}
?>	