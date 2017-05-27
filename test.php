<?php

function validate($code) 
{ 
  if(preg_match_all('/[0-9]{5}[-][0-9]{4}/', $code))
    return true; 
  else 
    return false; 
} 

$code = "055-555555"; 
$validate = validate($code); 
print strlen($code);
echo '<br/>';
if(($validate == "1")&&(strlen($code)==10))
{ 
	echo"".$code." to kod poprawny"; 
} 
else {print "błędny kod";}

echo '</pre>';

?>