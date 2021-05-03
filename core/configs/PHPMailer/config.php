<?php
$mail->SMTPDebug = 4;                               
$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';                    
$mail->SMTPAuth = true;                            
$mail->Username   = 'elibraryprovisional@gmail.com';
$mail->Password   = 'eLib@#@#';              
$mail->SMTPSecure = 'tls';  
$mail->Port = 587;
$mail->setFrom('elibraryprovisional@gmail.com', 'eLibrary | Do Not Reply');
$mail->isHTML(true);           
?>
