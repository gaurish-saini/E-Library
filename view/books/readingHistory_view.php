<div class="container" style="margin-top: 30px; padding-bottom:60px;">
  <h4>READING HISTORY</h4>
   <ul class="collapsible expandable">
    <li>
      <div class="collapsible-header"><i class="material-icons indigo-text">history</i>January<?php if(count($jan_list) != 0){?></div>
      <div class="collapsible-body">
        <span>
        <?php foreach($jan_list as $index=>$jan){	?>  
        <?=$jan['book_name']?></br>
        <?php } }else{?>
        </span>
        <label class="month-label"> | No History</label>
        <?php } ?>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons indigo-text">history</i>Febuary<?php if(count($feb_list) != 0){?></div>
      <div class="collapsible-body">
        <span>
        <?php foreach($feb_list as $index=>$feb){	?>  
        <?=$feb['book_name']?></br>
        <?php } }else{?>
        </span>
        <label class="month-label"> | No History</label>
        <?php } ?>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons indigo-text">history</i>March<?php if(count($mar_list) != 0){?></div>
      <div class="collapsible-body">
        <span>
        <?php foreach($mar_list as $index=>$mar){	?>  
        <?=$mar['book_name']?></br>
        <?php } }else{?>
        </span>
        <label class="month-label"> | No History</label>
        <?php } ?>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons indigo-text">history</i>April<?php if(count($apr_list) != 0){?></div>
      <div class="collapsible-body">
        <span>
        <?php foreach($apr_list as $index=>$apr){	?>  
        <?=$apr['book_name']?></br>
        <?php } }else{?>
        </span>
        <label class="month-label"> | No History</label>
        <?php } ?>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons indigo-text">history</i>May<?php if(count($may_list) != 0){?></div>
      <div class="collapsible-body">
        <span>
        <?php foreach($may_list as $index=>$may){?>  
        <?=$may['book_name']?></br>
        <?php } }else{?>
        </span>
        <label class="month-label"> | No History</label>
        <?php } ?>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons indigo-text">history</i>June<?php if(count($jun_list) != 0){?></div>
      <div class="collapsible-body">
        <span>
        <?php foreach($jun_list as $index=>$jun){	?>  
        <?=$jun['book_name']?></br>
        <?php } }else{?>
        </span>
        <label class="month-label"> | No History</label>
        <?php } ?>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons indigo-text">history</i>July<?php if(count($jul_list) != 0){?></div>
      <div class="collapsible-body">
        <span>
        <?php foreach($jul_list as $index=>$jul){	?>  
        <?=$jul['book_name']?></br>
        <?php } }else{?>
        </span>
        <label class="month-label"> | No History</label>
        <?php } ?>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons indigo-text">history</i>August<?php if(count($aug_list) != 0){?></div>
      <div class="collapsible-body">
        <span>
        <?php foreach($aug_list as $index=>$aug){	?>  
        <?=$aug['book_name']?></br>
        <?php } }else{?>
        </span>
        <label class="month-label"> | No History</label>
        <?php } ?>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons indigo-text">history</i>September<?php if(count($sep_list) != 0){?></div>
      <div class="collapsible-body">
        <span>
        <?php foreach($sep_list as $index=>$sep){	?>  
        <?=$sep['book_name']?></br>
        <?php } }else{?>
        </span>
        <label class="month-label"> | No History</label>
        <?php } ?>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons indigo-text">history</i>October<?php if(count($oct_list) != 0){?></div>
      <div class="collapsible-body">
        <span>
        <?php foreach($oct_list as $index=>$oct){	?>  
        <?=$oct['book_name']?></br>
        <?php } }else{?>
        </span>
        <label class="month-label"> | No History</label>
        <?php } ?>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons indigo-text">history</i>November<?php if(count($nov_list) != 0){?></div>
      <div class="collapsible-body">
        <span>
        <?php foreach($nov_list as $index=>$nov){	?>  
        <?=$nov['book_name']?></br>
        <?php } }else{?>
        </span>
        <label class="month-label"> | No History</label>
        <?php } ?>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons indigo-text">history</i>December<?php if(count($dec_list) != 0){?></div>
      <div class="collapsible-body">
        <span>
        <?php foreach($dec_list as $index=>$dec){	?>  
        <?=$dec['book_name']?></br>
        <?php } }else{?>
        </span>
        <label class="month-label"> | No History</label>
        <?php } ?>
      </div>
    </li>
  </ul>
</div>
<!-- <?= date('d/m/y',$bok['transaction_time']) ?> -->