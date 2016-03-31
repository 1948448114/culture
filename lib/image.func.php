<?php
require_once 'string.func.php';
//铜鼓通过GD库做验证码
function verifyImage($type=3,$length=4,$pixel=0,$line=0,$sess_name="verify"){
//创建画布
	$width=110;
	$height=34;
	$image = imagecreatetruecolor($width, $height);
	$white= imagecolorallocate($image, 255, 255, 255);
	$black= imagecolorallocate($image, 0, 0, 0);
//用填充矩形填充画布
	imagefilledrectangle($image, 1, 1, $width-2, $height-2, $white);
	$chars=buildRandomString($type,$length);
	$_SESSION[$sess_name]=$chars;
	$fontfiles=array("simkai.TTF","SIMYOU.TTF","simsunb.TTF");
	//$fontfiles=array("simkai.TTF");
	//$fontfiles=array("times.ttf");
	for($i=0;$i<$length;$i++){
		$size=mt_rand(16,20);
		$angle=mt_rand(-10,10);
		$x=5+$i*$size;
		$y=mt_rand(20,26);
		$fontfile="../fonts/".$fontfiles[mt_rand(0,count($fontfiles)-1)];
		$color=imagecolorallocate($image,mt_rand(50,90), mt_rand(60,180), mt_rand(0,66));
		$text=substr($chars,$i,1);
		imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
	}
	if($pixel){
		for($i=0;$i<$pixel;$i++){
			imagesetpixel($image, mt_rand(0,$width-1),mt_rand(0,$height-1), $black);
		}
	}
	if($line){
		for($i=0;$i<$line;$i++){
			$color=imagecolorallocate($image,mt_rand(50,90), mt_rand(60,180), mt_rand(0,66));
			imageline($image,mt_rand(0,$width-1),mt_rand(0,$height-1), mt_rand(0,$width-1),mt_rand(0,$height-1), $color);
		}
	}
	ob_clean(); 
	header("content-type:image/png");
	imagegif($image);
	imagedestroy($image);
}

?>