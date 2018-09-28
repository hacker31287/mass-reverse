<?php
echo "+-+-+-+-+-+-+ +-+-+-+-+-+-+-+"."\n";
echo "| 3|x|p|1|r|3| |P|r|1|n|c|3 |"."\n";
echo "+-+-+-+-+-+-+ +-+-+-+-+-+-+-+"."\n";;
echo "|  D|a|t|e   :    27/09/18  |"."\n";
echo "|Mass   |Reverse|   |grabber|"."\n";
echo "|~~ Jokr Haxor|Saiyan Haxor!|"."\n";
echo "+-+-+-+-+-+ +-+-+-+-+-+-+-+-+"."\n";
echo ""."\n";
$open=fopen("list.txt","r");
while(!feof($open)) {
  $opening=fgets($open);
  $opening=trim($opening,"
  ");
  $length=strlen($opening);
  $length=$length-1;
  if (strpos($opening,"http://")==0) {
    $opening=str_replace("http://","",$opening);
  }
  if (strpos($opening,"https://")==0) {
    $opening=str_replace("https://","",$opening);
  }
  if (strpos($opening,"/")==$length) {
    $opening=str_replace("/","",$opening);
  }
  $api="http://api.hackertarget.com/reverseiplookup/?q=$opening";
  $domains=file_get_contents($api);
  $filegen=fopen("grabbed.txt","a");
  fwrite($filegen,$domains);
  $open_list=fopen("grabbed.txt","r");
  $count=0;
  while (!feof($open_list)) {
    $opening_list=fgets($open_list);
    $count++;
  }
  fclose($open_list);
  echo $opening."\n"."Current Domain Count: ".$count."\n";
}
fclose($open);
?>
