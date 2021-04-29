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
		parent::insert($this->table,$this->names,$this->values);
	}
    
    public  function fetchUser($values){
		$values=explode(',',$values);
		return parent::fetchOne($this->table,$this->names,$values);
	}
    
    public function verify($row,$pass){
		if(isset($row)){
			if(password_verify($pass, $row['password'])){
				if($row['verified_id']=="0"){
					session_destroy();
					header('location:/splashmsg?msgtype=unverified');
				}
				else {
					$type=$row['type'];    			
					$uid=$row['uid'];
					$name=$row['user_name'];
					$email=$row['email_id'];
					require __dir__.'/'.'../../Controllers/common/setUserSession.php';
					header('location:/login');
				}
			}
			else
				$this->flashError([NULL,'Invalid Password'],'/');
		}
		else	
			$this->flashError(['Invalid Email Address','Invalid Password'],'/');
	}
}
?>