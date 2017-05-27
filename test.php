<?php

function validate($code) 
{ 
  if(preg_match_all('/[0-9]{5}[-][0-9]{2}/', $code))
    return true; 
  else 
    return false; 
} 

$code = "05-555"; 
$validate = validate($code); 

if($validate == "1"){ echo"".$code." to kod poprawny"; } 

?>