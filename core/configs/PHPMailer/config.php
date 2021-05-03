<?php
$mail->SMTPDebug = 4;                               
$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';                    
$mail->SMTPAuth = true;                            
$mail->Username   = '';
$mail->Password   = '';              
$mail->SMTPSecure = 'tls';  
$mail->Port = 587;
$mail->setFrom('', 'eLibrary | Do Not Reply');
$mail->isHTML(true);           
?>