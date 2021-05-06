<?php
class Books extends QueryBuilder{
	protected  $table='books';
	protected  $names=['bid'];
	protected $values=[];
	public  function fetchBook($values){
		$values=explode(',',$values);
		return parent::fetchOne($this->table,$this->names,$values);
	}
	public function fetchBooks(){
		return parent::fetchList($this->table);
	}
	public function freshBook($bid){
		$row=$this->fetchBook($bid);
		if(isset($row))
			return FALSE;
		else
			return TRUE;
	}
	public function fetchBooksLimit($limit,$offset){
		return parent::fetchList2($this->table,($limit-1),$offset);
	}
	public function deleteBook($bid){
		$this->deleteAllCategories($bid);
		$this->deleteAllReaders($bid);
		return parent::delete($this->table,'bid',$bid);
	}
	public function registerBook($bookname,$authorname,$edition,$title){
		$this->names=['book_name','author_name','edition','cover_image_name'];
		$this->values=["'{$bookname}'","'{$authorname}'","'{$edition}'","'{$title}'"];
		return (parent::insert($this->table,$this->names,$this->values));
	}
	public function enterCategories($bid,$categories){
		$this->names=['bid','cid'];
		foreach ($categories as $category) {
			$this->values=["'{$bid}'","'{$category}'"];
			parent::insert('has_category',$this->names,$this->values);
		}
	}
	public function deleteAllCategories($bid){
		parent::delete('has_category','bid',$bid);
	}
	public function deleteAllReaders($bid){
		parent::delete('has_book','bid',$bid);
	}
	public function fetchCategories($bid){
		return (parent::fetchList('has_category','bid',$bid));
	}
	public function updateBook($booknames,$bookvalues,$bid){
		$i=0;
		$update=[];
		while(isset($booknames[$i])){
			$update+=[$booknames[$i]=>$bookvalues[$i]];
			$i++;
		}
		return (parent::update($this->table,$update,'bid',$bid));
	}
	public function fetchLastWeekBook(){
		$date = date("Y-m-d");
		$days_ago = date('Y-m-d', strtotime('-7 days', strtotime($date)));
		$check=" last_modify >= '".$days_ago."'";
		return (parent::fetchList1('books',$check));
	}
}
?>