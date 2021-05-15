<?php
class Users extends QueryBuilder{
	protected  $table='users';
	protected  $names=['email_id'];
	protected $values=[];
	
    public function sendVerificationMail($lnk,$emailid,$name){
		$GLOBALS['mail']->addAddress($emailid, $name);
		$GLOBALS['mail']->Subject  = 'Verification Link for eLibrary';
		$GLOBALS['mail']->Body     = 'Hi '.$name.' ,<br/><br/>Thank you for Registration at eLibrary.<br>Please verify your email account by <a href="'.$lnk.'"> clicking on this activation link</a><br/>Welcome once again. <br> <br/><br/>Thanks & Regards,<br> eLibrary Team';
		if(!$GLOBALS['mail']->send()) {
			return FALSE;
		}
		return TRUE; 
	}
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

			if($id!=NULL){
				header('location:/login');
			}
			else{
				$lnk='http://e-library.test/verify?id='.$emailid.'&secret='.$pass;
				if($this->sendVerificationMail($lnk,$emailid,$name)){
					header("location:/splashmsg?msgtype=unverified");
				}
				else{
					$this->deleteUser($emailid);
					$this->flashError(['Internal Error, Try Again'],'/index?register=1');
				}	
			}
		}
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
					require __dir__.'/'.'../../controllers/common/setUserSession.php';
					header('location:/login');
				}
			}
			else
				$this->flashError([NULL,'Invalid Password'],'/');
		}
		else	
			$this->flashError(['Invalid Email Address','Invalid Password'],'/');
	}
	public function activate($emailid){
		if(!parent::update($this->table,['verified_id'=>'1'],'email_id',$emailid))	
			$this->flashError(['Problem in Verification'],'/');	
	}
	public function readBook($uid,$bid){
		$this->names=['uid','bid', 'type'];
		$this->values=["'{$uid}'","'{$bid}'", "'read_shelf'"];
		$book = new Books();
		$book->updateBookCount($bid);
		parent::insert('has_book',$this->names,$this->values);	
	}
	public function readHistoryBook($uid,$bid){
		$update=[ [ 'uid'  => "'{$uid}'",
					'bid'  => "'{$bid}'",
					'type' => "'history_read'"
				],[
						'type' => "history_read"
					]
				];
		parent::updateOrCreate('has_book', $update);	
	}
	public function passwordUpdate($emailid,$password){
		$password=password_hash($password, PASSWORD_DEFAULT);
		if(!parent::update($this->table,['password'=>$password],'email_id',$emailid))	
			$this->flashError(['Problem in Updation'],'/passwordreset');	
		else
			header('location:/');
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
	public function fetchBooks($uid){
		return (parent::fetchList('has_book','uid',$uid));
	}
	public function deleteUser($emailid){
		return parent::delete($this->table,$this->names[1],$emailid);
	}
}
?>