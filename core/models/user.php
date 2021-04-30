<?php
class Users extends QueryBuilder{
	protected  $table='users';
	protected  $names=['email_id'];
	protected $values=[];
    
	public function flashError($msg,$dir){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$i=1;
		foreach ($msg as $values) {
			$param='error'.$i++;
			$_SESSION[$param]=$values;
		}
		header("location:{$dir}");
	}
	public function registerUser($name,$emailid,$pass,$id){
		$pass=password_hash($pass, PASSWORD_DEFAULT);
		$this->names=['user_name','email_id','password','provider_id','verified_id'];
		$this->values=["'{$name}'","'{$emailid}'","'{$pass}'","'{$id}'","'0'"];
		if(parent::insert($this->table,$this->names,$this->values)){

			echo 'user registered !';
			header('location:/login');
		}
	}
    public  function fetchUser($values){
		$values=explode(',',$values);
		return parent::fetchOne($this->table,$this->names,$values);
	}
    public function freshUser($emailid){
		$row=$this->fetchUser($emailid);
		if(isset($row))
			return FALSE;
		else
			return TRUE;
	}
}
?>