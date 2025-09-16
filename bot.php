<?php
date_default_timezone_set('Asia/Jakarta');
system("clear");
$putih="\e[1;37m";
$hitam="\033[0;30m";
$merah="\e[1;31m";
$kuning="\33[1;33m";
$hijau="\33[32;1m";
$biru="\e[1;34m";
$ungu="\e[1;35m";
$abu="\e[1;30m";
$cyan="\e[0;36m";
$resred="\033[101m\033[1;37m";
error_reporting(0);
function get($url){
  global $cok;
  $u[]="authority: simplebits.io";
  $u[]="upgrade-insecure-requests: 1";
  $u[]="user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36";
  $u[]="Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7";
  $u[]="dnt: 1";
  $u[]="origin: https://simplebits.io";
  $u[]="accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7";
  $u[]="cookie: ".$cok;
  $ch=curl_init();
  curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_FOLLOWLOCATION => 1,
    CURLOPT_HTTPHEADER => $u,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_SSL_VERIFYHOST => 2,
    CURLOPT_ENCODING => "gzip",
    ));
    curl_getinfo($ch);
    return curl_exec($ch);
    curl_close($ch);
}
function post($url,$data){
  global $cok;
  $u[]="authority: simplebits.io";
  $u[]="user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36";
  $u[]="accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7";
  $u[]="content-type: application/json";
 // $u[]="dnt: 1";
  $u[]="origin: https://simplebits.io";
  //$u[]="x-requested-with: XMLHttpRequest";
  $u[]="accept: */*";
  $u[]="cookie: ".$cok;
  $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $u);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 2);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
	curl_getinfo($ch);
	return curl_exec($ch);
	
}

if(!file_exists("data.json")){
while("true"){
system("clear");

$api["wallet"]=readline("\033[101m \033[1;97m\033[1;97mInput cookie\033[0m  : \033[1;92m");
echo "\n";
//$api["Password"]=readline("\033[101m \033[1;97m\033[1;97mInput Faucetpay imail\033[0m : \033[1;92m");
if($api["wallet"]!=""){
break;
}
}
  save("data.json",$api);
//$a=next($ran);
}

$cok=json_decode(file_get_contents("data.json"),true)["wallet"];
//$pass=json_decode(file_get_contents("data.json"),true)["Password"];

//FUNGSI SAVE
function save($data,$data_post){
    if(!file_get_contents($data)){
      file_put_contents($data,"[]");}
    $json=json_decode(file_get_contents($data),1);
    $arr=array_merge($json,$data_post);
    file_put_contents($data,json_encode($arr,JSON_PRETTY_PRINT));
}

//FUNGSI WAKTU
function timer($t){
     $timr=time()+$t;
      while(true):
      echo "\r                                                    \r";
      $res=$timr-time();
      if($res < 1){break;}
if($res==$res){
//  $str= str_repeat("\033[1;92m◼",$res)."              \r";
}
      echo " \033[1;97mPlease Wait \033[1;91m".date('i:s',$res)." ";
      sleep(1);
      endwhile;
}

//FUNGSI SLOWMOTION
function slow($str,$t){
$arr = str_split($str);
foreach ($arr as $az){
echo $az;
usleep($t);
}
}
function faucet(){
  global $hitam, $putih, $hijau, $biru, $kuning, $cyan ,$merah;
//goto s;
$url="https://simplebits.io/faucet";
$res=get($url);
//if(!$res){
$c=explode('faucet:',$res)[52];
$stamp=explode('},player:',explode('{countdown:0,last_faucet_claim:',$res)[1])[0];
$ja= date_create(date('H:i', $stamp));
$jak1= date_create(date('H:i', time()));
$jak2= date_diff($ja,$jak1);
//$jak=substr($ja,3);
//echo "\n".$jak1."\n";
$stam= $jak2->i;
//echo "\n".$putih.$stam."\n";
if($stam>30){
  $stam=30;
}
$tam=$stam * 60;
$wakt=30 * 60;
$waktu=$wakt - $tam;
if($waktu > 5){
  timer($waktu);
}
//}
s:
while(true){
  goto m;
$url="https://simplebits.io/challenges";
$res=get($url);
$shot=explode('"Complete 70 Shortlinks",',explode('"Complete 30 Shortlinks",',$res)[1])[0];
$sho=explode(',reset_time:',explode('progress:',$shot)[1])[0];
//$id=explode(',name:',explode('challenge_id:',$shot)[1])[0];
if($sho>70){
  $url="https://simplebits.io/api/player/challenge/";
  $data='{"challenge_id":21}';
  $ret=post($url,$data);
  echo $ret."\n";
}

m:
  date_default_timezone_set('Asia/Jakarta');
$url="https://simplebits.io/faucet";
$res=get($url);

timer(11);
$tex=$cyan."\r ••• BYPASSING CAPTCHA ••• \r";
echo slow($tex,65000);
$te=$hitam."\r                           \r".$putih;
echo slow($te,15000);

$url="https://simplebits.io/api/captcha";
$res=get($url);
preg_match_all('#"value":"(.*?)",#is',$res,$has);
$chel=explode('","id"',explode(',"challenge":"',$res)[1])[0];
$id=explode('"}',explode(',"id":"',$res)[1])[0];

$data = $chel;
//list($type, $data) = explode(';', $data);
//list(, $data)      = explode(',', $data);
$data = base64_decode($data);
file_put_contents('image.png', $data);

//shell_exec('curl -H "apikey:K81189943088957" --form "file=@image.png" --form "language=eng" --form "OCREngine=2" --form "isOverlayRequired=true" https://api.ocr.space/parse/image &> ptc.txt');
shell_exec('tesseract image.png ptc &> none');

//$output=file_get_contents("ptc.txt");
$ch=file_get_contents("ptc.txt");
//preg_match_all('#"LineText":"(.*?)",#is',$output,$cap);
//print_r($cap);
//$ch=explode('","language"',explode('"text":"',$output)[1])[0];

//$ch=$cap[1][0];
$ch1=substr($ch,0,2);
$ch2=substr($ch,2);
//timer(4);

$data='{"captcha_id":"'.$id.'","scaptcha":["'.$ch1.'","'.$ch2.'"]}';
$data=str_replace("\n","",$data);
$url="https://simplebits.io/api/player/faucet/claim";
$res=post($url,$data);
$has=explode(',"exp":',explode(',"tokens":',$res)[1])[0];
timer(3);
$in='{"status":422,"code":"FAUCET_ERROR","message":"Invalid Faucet Claim"}';
$ini='{"message":"Unauthorized"}';
if($res == $in){
  echo $res."\n";
  goto m;
}elseif($res == $ini){
  echo "update cookie";
  break;
}else{
echo $putih."[".$merah."√".$putih."] ".$hijau.$res.$biru."\n";
}
timer(60*30);

}
}


function shortlink(){
global $hitam, $putih, $hijau, $biru, $kuning, $cyan ,$merah;
$no = 1;
re:
$url="https://simplebits.io/shortlinks";
$res=get($url);
$wa=explode('{id:23,',explode('{id:15,name:"Simple SL"',$res)[1])[0];
$wak=explode('},',explode('next_reset:',$wa)[1])[0];
$com=explode(',next_reset',explode('completed:',$wa)[1])[0];
if($com==4){
  timer($wak + 2);
}
echo "#\n";
while(true){
  date_default_timezone_set('Asia/Jakarta');
$url="https://simplebits.io/api/shortlink/15";
$res=get($url);
$url1=explode('"}',explode('":"',$res)[1])[0];
ur:
$url=$url1;
$ur=explode('https://simplebits.io/short/',$url)[1];
$res=get($url);

timer(7);
$data="{}";
$url="https://simplebits.io/short/next/".$ur;
$res=post($url,$data);

$tex="\r ".$res."\r";
$te=$hitam."\r                                                       \r";
echo slow($tex,25000);
echo slow($te,10000);
$fin='{"step":4}';
$gc='{"status":422,"code":"SL_INVALID","message":"Invalid Captcha"}';
$gh='{"status":422,"code":"SL_INVALID","message":"Invalid Shortlink"}';
$gf='{"type":"error","error":{"message":"Method Not Allowed"}}';
if($res==$gh){
  goto re;
}elseif($res==$gc){
  goto re;
}elseif($res == $gf){
  goto re;
}elseif($res!==$fin){
  goto ur;
}

$url="https://simplebits.io/short/".$ur;
$res=get($url);
$tex=$cyan."\r ••• BYPASSING CAPTCHA ••• \r";
echo slow($tex,65000);
$te=$hitam."\r                           \r".$putih;
echo slow($te,15000);
$url="https://simplebits.io/api/captcha";
$res=get($url);
//echo $res."\n";
preg_match_all('#"value":"(.*?)",#is',$res,$has);

$chel=explode('","id"',explode(',"challenge":"',$res)[1])[0];
$id=explode('"}',explode(',"id":"',$res)[1])[0];

$data = $chel;
//list($type, $data) = explode(';', $data);
//list(, $data)      = explode(',', $data);
$data = base64_decode($data);
file_put_contents('image1.png', $data);

shell_exec('tesseract image1.png ptc1 &> none');
//shell_exec('curl -H "apikey:K81189943088957" --form "file=@image1.png" --form "language=eng" --form "OCREngine=2" --form "isOverlayRequired=true" https://api.ocr.space/parse/image &> ptc1.txt');

//shell_exec('curl \-F "apiKey=8krtUNsmw5oQkZY8QSuQLLRc1Qxt6CxJGY2PQa4Vv5tG" \-F "image=@image1.png" \https://api.optiic.dev/process &> ptc1.txt');

//$output=file_get_contents("ptc1.txt");
$ch=file_get_contents("ptc1.txt");
//preg_match_all('#"LineText":"(.*?)",#is',$output,$cap);
//print_r($cap);
//$ch=explode('","language"',explode('"text":"',$output)[1])[0];
//$ch=$cap[1][0];
$ch1=substr($ch,0,2);
$ch2=substr($ch,2,4);
if($ch1==null){
  echo $ch."\n";
}
timer(4);

$data='{"captcha":{"captcha_id":"'.$id.'","scaptcha":["'.$ch1.'","'.$ch2.'"]}}';
$data=str_replace("\n","",$data);
$url="https://simplebits.io/short/complete/".$ur;
$res=post($url,$data);
$url1=explode('"}',explode('":"',$res)[1])[0];
echo $res."\n";
//{"message":"Internal Error"}
$gc='{"status":422,"code":"SL_INVALID","message":"Invalid Captcha"}';
$gh='{"status":422,"code":"SL_INVALID","message":"Invalid Shortlink"}';
$gf='{"message":"Unauthorized"}';
$gm='{"type":"error","error":{"message":"Method Not Allowed"}}';
if($res===$gh){
  goto re;
}elseif($res===$gm){
  goto re;
}elseif($res===$gc){
  goto re;
}elseif($res===$gf){
  echo "update cookie";
  break;
}
$url=$url1;
$res=get($url);
$has1=explode('},"uses":{"search_params"',explode('{id:6,name:"ShrinkEarn",',$res)[1])[0];
$has=explode(',reward:',$has1)[1];
$wa=explode('{id:23,',explode('{id:15,name:"Simple SL"',$res)[1])[0];
$wak=explode('},',explode('next_reset:',$wa)[1])[0];
$com=explode(',next_reset',explode('completed:',$wa)[1])[0];

echo $putih."[".$merah.$no++.$putih."] ".$kuning."You Just Recive ".$hijau.$has."\n";
if($com==4){
  timer($wak + 2);
}
}
}

a:
echo$merah." !!! ".$biru."Pilihan script yg ada ".$merah."=\n";
echo $merah."    ~[1] ".$cyan."Shortlink SBSL\n";
echo $merah."    ~[2] ".$cyan."Faucet\n";
echo $merah."    ~[X] ".$cyan."Dayli\n";
echo $merah."    ~[X] ".$cyan."PTC\n";
echo $putih." #####################################################################\n";
$pil=readline($kuning."   • Pilihan Anda =   ".$merah);
if($pil=="1"){
  $tex=$cyan." ••• Riderecting ••• \r";
  echo slow($tex,45000);
  $te=$hitam."\r                    \r".$putih;
  echo slow($te,15000);
  system("clear");
  shortlink();
}elseif($pil=="2"){
  $tex=$cyan."\r ••• Riderecting ••• \r";
  echo slow($tex,45000);
  $te=$hitam."\r                    \r".$putih;
  echo slow($te,15000);
  system("clear");
  faucet();
}elseif($pil=="3"){
  $tex=$cyan."\r ••• Riderecting ••• \r";
  echo slow($tex,45000);
  $te=$hitam."\r                    \r".$putih;
  echo slow($te,15000);
  system("clear");
  dayli();
}elseif($pil=="4"){
  $tex=$cyan."\r ••• Riderecting ••• \r";
  echo slow($tex,45000);
  $te=$hitam."\r                    \r".$putih;
  echo slow($te,15000);
  system("clear");
  ptc();
}else{
  echo $merah."  $*&%##*! Pilih yg Bener lah !!!";
  sleep(5);
  system("clear");
  goto a;
}