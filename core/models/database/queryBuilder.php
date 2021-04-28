<?php
class QueryBuilder{
    public function insert($table,$names,$values){	
		$names=implode(',',$names);
		$values=implode(',',$values);
		$qry="INSERT INTO {$table} ({$names}) VALUES ({$values})";
		$result=mysqli_query($GLOBALS['conn'],$qry);
		return ($GLOBALS['conn']->insert_id);
	}	

	// public function fetchOne($table,$names,$values){
	// 	$names=implode(',',$names);
	// 	$values=implode(',',$values);
	// 	$qry="SELECT * FROM {$table} WHERE {$names} = '{$values}'";
	// 	$result=mysqli_query($GLOBALS['conn'],$qry);
	// 	if($result)
	// 		return (mysqli_fetch_assoc($result));
	// 	else
	// 		return NULL;
	// }
	// public function fetchList($table,$name=1,$value=1){
	// 	$qry="SELECT * FROM {$table} WHERE {$name}={$value}";
	// 	$result=mysqli_query($GLOBALS['conn'],$qry);		
	// 	return $result;
	// }
	// public function fetchList1($table,$whereClause){
	// 	$qry="SELECT * FROM {$table} WHERE {$whereClause}";
	// 	$result=mysqli_query($GLOBALS['conn'],$qry);		
	// 	return $result;
	// }
	// public function fetchList2($table,$limit,$offset){
	// 	$limit+=1;
	// 	$limit=abs($limit);
	// 	$offset=abs($offset);
	// 	$qry="SELECT * FROM {$table} LIMIT {$offset},{$limit}";
	// 	$result=mysqli_query($GLOBALS['conn'],$qry);		
	// 	return $result;
	// }		
	// public function delete($table,$name,$value){	
	// 	$qry="DELETE FROM {$table} WHERE {$name}= '{$value}'";
	// 	$result=mysqli_query($GLOBALS['conn'],$qry);
	// 	return ($result);
	// }
	// public function delete2($table,$name1,$value1,$name2,$value2){
	// 	$qry="DELETE FROM {$table} WHERE {$name1}= '{$value1}' and {$name2}= '{$value2}'";
	// 	$result=mysqli_query($GLOBALS['conn'],$qry);
	// 	return ($result);
	// }	
	// public function update($table,$update,$check,$id){	
	// 	$str=',';
	// 	foreach ($update as $key => $value) {
	// 		$str=$str.$key."='{$value}',";
	// 	}
	// 	$str=trim($str,',');
	// 	$qry="UPDATE {$table} SET {$str} WHERE {$check}='{$id}'";
	// 	$result=mysqli_query($GLOBALS['conn'],$qry);
	// 	return ($result);
	// }
}
?>	