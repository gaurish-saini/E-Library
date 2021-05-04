<?php
class QueryBuilder{
    public function insert($table,$names,$values){	
		$names=implode(',',$names);
		$values=implode(',',$values);
		$qry="INSERT INTO {$table} ({$names}) VALUES ({$values})";
		$result=mysqli_query($GLOBALS['conn'],$qry);
		return ($GLOBALS['conn']->insert_id);
	}	
	public function delete($table,$name,$value){	
		$qry="DELETE FROM {$table} WHERE {$name}= '{$value}'";
		$result=mysqli_query($GLOBALS['conn'],$qry);
		return ($result);
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
	public function update($table,$update,$check,$id){	
		$str=',';
		foreach ($update as $key => $value) {
			$str=$str.$key."='{$value}',";
		}
		$str=trim($str,',');
		$qry="UPDATE {$table} SET {$str} WHERE {$check}='{$id}'";
		$result=mysqli_query($GLOBALS['conn'],$qry);
		return ($result);
	}
}
?>	