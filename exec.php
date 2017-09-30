<?php
function compress($source, $destination, $quality){
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);
    imagejpeg($image, $destination, $quality);
    return $destination;
}

compress("screenshot.png", "screenshot.png", 10);


if(isset($_POST["button"])){
	if($_POST["button"]=="click"){
		$c=1;
		$x=$_POST["x"];
		$y=$_POST["y"];
	}elseif($_POST["button"]=="2click"){
		$c=2;
		$x=$_POST["x"];
		$y=$_POST["y"];
	}elseif($_POST["button"]=="shiftclick"){
		$c=3;
		$x=$_POST["x"];
		$y=$_POST["y"];
	}elseif($_POST["button"]=="right-click"){
		$c=4;
		$x=$_POST["x"];
		$y=$_POST["y"];
	}elseif($_POST["button"]=="write"){
		$c=5;
		$x=$_POST["write"];
	}elseif($_POST["button"]=="cam"){
		$c=6;
	}


	$myfile = fopen("commando.txt", "w");
	fwrite($myfile, $c);
	fclose($myfile);
	if($c<6){
		$myfile = fopen("x.txt", "w");
		fwrite($myfile,$x);
		fclose($myfile);
	}
	if($c<5){
		$myfile = fopen("y.txt", "w");
		fwrite($myfile, $y);
		fclose($myfile);
	}
}
?>
