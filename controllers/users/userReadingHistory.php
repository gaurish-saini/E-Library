<?php
$user = new Users();
$uid=$_SESSION['uid'];
$readBook=$user->fetchBooks($uid, 'history_read');
$i=0;
  $book = new Books;

  while($bok=mysqli_fetch_assoc($readBook)){ 
      $bid=$bok['bid'];
      $row=$book->fetchBook($bid);
      // var_dump($bok);die;
      $date= strtotime($bok['transaction_time']);
      $month= date('m',$date);  
      if($month=='01'){
        $jan_list[]=$row;
      }else{
          $jan_list= array();
      }
      if($month=='02'){
        $feb_list[]=$row;
      } else{
        $feb_list=array();
      }
      if($month=='03'){
        $mar_list[]=$row;
      } else{
        $mar_list=array();
      }
      if($month=='04'){
        $apr_list[]=$row;
      } else{
        $apr_list=array();
      }
      if($month=='05'){
        $may_list[]=$row;
      } else{
        $may_list= array();
      }
      if($month=='06'){
        $jun_list[]=$row;
      } else{
        $jun_list=array();
      }
      if($month=='07'){
        $jul_list[]=$row;
      } else{
        $jul_list=array();
      }
      if($month=='08'){
        $aug_list[]=$row;
      } else{
        $aug_list=array();
      }
      if($month=='09'){
        $sep_list[]=$row;
      } else{
        $sep_list=array();
      }
      if($month=='10'){
        $oct_list[]=$row;
      } else{
        $oct_list=array();
      }
      if($month=='11'){
        $nov_list[]=$row;
      } else{
        $nov_list=array();
      }
      if($month=='12'){
        $dec_list[]=$row;
      }
      else{
        $dec_list=array();
      }
  }
require __dir__.'/'.'../../view/common/sidebar.php';
require __dir__.'/'.'../../view/books/readingHistory_view.php';
?>