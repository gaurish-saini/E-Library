<?php
$mail->SMTPDebug = 0;                               
$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';                    
$mail->SMTPAuth = true;                            
$mail->Username   = 'gaurishprakhar@gmail.com';
$mail->Password   = 'Gaurish@5162';              
$mail->SMTPSecure = 'ssl';  
$mail->Host = 'ssl://smtp.gmail.com:465';
$mail->Port = 465;   
$mail->setFrom('gaurishprakhar@gmail.com', 'eLibrary | Do Not Reply');
$mail->isHTML(true);           
?>
