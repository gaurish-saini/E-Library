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
	public function fetchBooksLimit($limit,$offset, $order=null, $search=''){
		if (!is_null($order)) {
			switch ($order) {
				case 'a-z':
					$order = 'book_name';
					break;
				case 'z-a':
					$order = 'book_name DESC';
					break;
				default:
					$order = 'last_modify DESC';
					break;
			}
		}
		if (!is_null($search) && !empty($search)) {
			$search = "book_name LIKE '%{$search}%' OR author_name LIKE '%{$search}%'";
		}
		return parent::fetchList3($this->table,($limit-1),$offset, $order, $search);
	}
	public function deleteBook($bid){
		$this->deleteAllReaders($bid);
		return parent::delete($this->table,'bid',$bid);
	}
	public function registerBook($bookname,$authorname,$count,$description,$title){
		$this->names=['book_name','author_name','book_count','description','cover_image_name'];
		$this->values=["'{$bookname}'","'{$authorname}'","'{$count}'","'{$description}'","'{$title}'"];
		return (parent::insert($this->table,$this->names,$this->values));
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
	public function updateBookCount($bid, $type="decrement") {
		if ($type=='decrement') {
			$book=$this->fetchBook($bid);
			$count = $book['book_count']-1;
			$booknames=['book_count'];
			$bookvalues=[$count];
			$this->updateBook($booknames,$bookvalues,$bid);
		} elseif($type=="increment") {
			$book=$this->fetchBook($bid);
			$count = $book['book_count']+1;
			$booknames=['book_count'];
			$bookvalues=[$count];
			$this->updateBook($booknames,$bookvalues,$bid);
		}
	}
	public function deleteAllReaders($bid){
		parent::delete('has_book','bid',$bid);
	}
}
?>