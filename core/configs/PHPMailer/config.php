<?php
$mail->SMTPDebug = 0;                               
$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';                    
$mail->SMTPAuth = true;                            
$mail->Username   = '';
$mail->Password   = '';              
$mail->SMTPSecure = 'ssl';  
$mail->Host = 'ssl://smtp.gmail.com:465';
$mail->Port = 465;   
$mail->setFrom('', 'eLibrary | Do Not Reply');
$mail->isHTML(true);           
?>
