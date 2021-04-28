<?php
class Users extends QueryBuilder{
	protected  $table='users';
	protected  $names=['email_id'];
	protected $values=[];
	public  function fetchUser($values){
		$values=explode(',',$values);
		return parent::fetchOne($this->table,$this->names,$values);
	}
	public  function fetchUser1($values){
		$values=explode(',',$values);
		return parent::fetchOne($this->table,['uid'],$values);
	}
	public function fetchUsers(){
		return parent::fetchList($this->table);
	}
	public function fetchUsersLimit($limit,$offset){
		return parent::fetchList2($this->table,$limit,$offset);
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
	public function freshUser($emailid){
		$row=$this->fetchUser($emailid);
		if(isset($row))
			return FALSE;
		else
			return TRUE;
	}
	public function deleteUser($emailid){
		return parent::delete($this->table,$this->names[1],$emailid);
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
				$lnk='http://3.7.5.192/verify?id='.$emailid.'&secret='.$pass;
				if(Mail::sendVerificationMail($lnk,$emailid,$name)){
					header("location:/splashmsg?msgtype=unverified");
				}
				else{
					$this->deleteUser($emailid);
					$this->flashError(['Internal Error, Try Again'],'/index?register=1');
				}	
			}
		}
	}
	public function activate($emailid){
		if(!parent::update($this->table,['verified_id'=>'1'],'email_id',$emailid))	
			$this->flashError(['Problem in Verification'],'/');	
	}
	public function passwordUpdate($emailid,$password){
		$password=password_hash($password, PASSWORD_DEFAULT);
		if(!parent::update($this->table,['password'=>$password],'email_id',$emailid))	
			$this->flashError(['Problem in Updation'],'/passwordreset');	
		else
			header('location:/');
	}
	public function readBook($uid,$bid){
		$this->names=['uid','bid'];
		$this->values=["'{$uid}'","'{$bid}'"];
		parent::insert('has_book',$this->names,$this->values);	
	}
	public function unreadBook($uid,$bid){
		parent::delete2('has_book','uid',$uid,'bid',$bid);	
	}
	public function fetchBooks($uid){
		return (parent::fetchList('has_book','uid',$uid));
	}
	public function fetchLastWeekBooks($uid){
		$startWeek = date('Y-m-d',strtotime("Sunday Last Week"));
		$endWeek = date('Y-m-d');
		$check=" uid='".$uid."' AND transaction_time BETWEEN '".$startWeek."' AND '". $endWeek."'";
		return (parent::fetchList1('has_book',$check));
	}
	public function fetchUsersWithAllBookRead(){
		$userList=$this->fetchUsers();
		$usrIds=[];
		$book=new Books();
		while($usr=mysqli_fetch_assoc($userList)){
			if($usr['type']!=0){
				$readBooks=mysqli_num_rows($this->fetchBooks($usr['uid']));
				$allBooks=mysqli_num_rows($book->fetchBooks());
				if(($readBooks+1)>=$allBooks){
					$usrIds+=[$usr['uid']]; 
				}
			}
		}
		return $usrIds;
	}
	public function fetchInactiveUsers(){
		$userList=$this->fetchUsers();
		$usrIds=[];
		$book=new Books();
		while($usr=mysqli_fetch_assoc($userList)){
			$date = date("Y-m-d");
			$days_ago = date('Y-m-d', strtotime('-15 days', strtotime($date)));
			$check=" uid='".$usr['uid']."' AND transaction_time >= '".$days_ago."'";
			if($usr['uid']!=mysqli_fetch_assoc(parent::fetchList1('has_book',$check))['uid'])
				$usrIds+=[$usr['uid']];
		}
		return $usrIds;
	}
	public function deleteAllBooks($uid){
		return parent::delete('has_book','uid',$uid);
	}
	public function deleteUserById($uid){
		return parent::delete('users','uid',$uid);
	}

}
?>