<?php
/*
  	Author: 3xp1r3 Pr1nc3
	Date: 9/28/2018
	Public Script No: 02
	Script Name: 3x Mass Reverse Grabber
	Greetz: Jokr Haxor, Saiyan Haxor!
	usage:
		php grabber.php
*/
// Banner starts here!
echo "+-+-+-+-+-+-+ +-+-+-+-+-+-+-+"."\n";
echo "| 3|x|p|1|r|3| |P|r|1|n|c|3 |"."\n";
echo "+-+-+-+-+-+-+ +-+-+-+-+-+-+-+"."\n";;
echo "|  D|a|t|e   :    28/09/18  |"."\n";
echo "|Mass   |Reverse|   |grabber|"."\n";
echo "|~~ Jokr Haxor|Saiyan Haxor!|"."\n";
echo "+-+-+-+-+-+ +-+-+-+-+-+-+-+-+"."\n";
echo ""."\n";
$open=fopen("list.txt","r"); //opening main list!
while(!feof($open)) { //will run untill the list is over!
  $opening=fgets($open);
  $opening=trim($opening,"
  ");
  if (strpos($opening,"http://")==0) { //removes http://
    $opening=str_replace("http://","",$opening);
  }
  if (strpos($opening,"https://")==0) { //removes https://
    $opening=str_replace("https://","",$opening);
  }
  $api="http://premiumbins.tk/reverse/?ip=$opening"; //generating link
  $domains=file_get_contents($api);
  $filegen=fopen("grabbed.txt","a"); //generating output file!
  fwrite($filegen,$domains); //Writting grabbed domains!
  $open_list=fopen("grabbed.txt","r"); //Opens output file!
  $count=0; //sets domain count value!
  while (!feof($open_list)) { //loop for counting domains amount!
    $opening_list=fgets($open_list);
    $count++;
  }
  fclose($open_list);
  echo $opening."\n"."Current Domain Count: ".$count."\n"; //prints output!
}
fclose($open);
?>
