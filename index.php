<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head></head>
<body>
<?php
function validate($code) 
{ 
  if(preg_match_all('/[0-9]{2}[-][0-9]{3}/', $code))
	  {return true;} 
  else 
  {return false;} 
} 

$array = json_decode(file_get_contents("http://jsonplaceholder.typicode.com/photos?title_like=voluptate"), true); 
$array1 = json_decode(file_get_contents("http://jsonplaceholder.typicode.com/albums"), true); 
$array2 = json_decode(file_get_contents("http://jsonplaceholder.typicode.com/users"), true); 
//print $array[0]["albumId"].'<br/><br/>';

$countArray = count($array);
$countArray1 = count($array1);
$countArray2 = count($array2);
if($countArray&&$countArray1&&$countArray2!=0){
for ($i = 0; $i< $countArray;$i++ ){

	 $albumId = $array[$i]["albumId"];
		
		for($j = 0; $j < $countArray1; $j++){
			
			if($albumId == $array1[$j]["id"]){
				$userId[]=$array1[$j]["userId"];
			}
		}
	
 }
}else{print "Nie znaleziono rekordu odpowiadającemu kryteriom wyszukiwania";exit();}
if(!isset($userId)){print "Nie znaleziono rekordu odpowiadającemu kryteriom wyszukiwania";exit();}
if(count($userId)>1)$arrayUserIdUn = array_unique($userId);
else $arrayUserIdUn = $userId;
//print var_dump( $arrayUserIdUn);
$countUserId= count($arrayUserIdUn);
for($i=0;$i<$countUserId;$i++){
	$arrayUserIdUnS[$i]=$i;
	
}
$arrayUserIdUnSort=array_combine($arrayUserIdUnS,$arrayUserIdUn);

//print var_dump( $arrayUserIdUnSort);

for ($i = 0; $i< $countUserId;$i++ ){

	 $user = $arrayUserIdUnSort[$i];
		
		for($j = 0; $j < $countArray2; $j++){
			$zipCode = $array2[$j]["address"]["zipcode"];
			$zipCode = validate($zipCode);
			if($user == $array2[$j]["id"]){
				if($zipCode=="1"){
				$usersId[]=$array2[$j]["id"];
			}}
		}
	
 }
//print var_dump($array2);
print var_dump($usersId);
//print $array2[5]["address"]["zipcode"];
$url="http://jsonplaceholder.typicode.com/users?"; 
for ($i = 0; $i< count($usersId);$i++ ){
	$url.="&id=".$usersId[$i];
}

header("location:$url");

?>

</body>
</html>