<!DOCTYPE html> 
<html> 
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.js"></script>
	<link href="style.css?v=<?=rand(1,200);?>" rel="stylesheet" type="text/css">
<script type="text/javascript">

$(document).ready(function() {
	$(".up").click(function(){$("#screenshot").css("margin-top",parseInt($("#screenshot").css("margin-top"))+100);});
	$(".down").click(function(){$("#screenshot").css("margin-top",parseInt($("#screenshot").css("margin-top"))-100);});
	$(".right").click(function(){$("#screenshot").css("margin-left",parseInt($("#screenshot").css("margin-left"))-100);});
	$(".left").click(function(){$("#screenshot").css("margin-left",parseInt($("#screenshot").css("margin-left"))+100);});

	$("#screenshot").click(function(e){
		offset = $(this).offset();
		x = parseInt(e.pageX - offset.left);
		y = parseInt(e.pageY - offset.top);
		$("#x").val(x);
		$("#y").val(y); 
		$(".notclick").hide();
		$(".click").show();

	});
	$("button[name=button]").click(function(){
		$.ajax({
			type: 'post',
			url: 'exec.php',
			data: "button="+$(this).val()+"&x="+$("#x").val()+"&y="+$("#y").val()+"&write="+encodeURIComponent($("textarea[name=text]").val()),
			success: function (data) {
				window.location.replace("index.php");
			}
		});
	});


});
</script>

</head> 
<body> 
<div data-role="page" style="position:fixed;">
	<div data-role="header">
		<input type="text" name="x" id="x" style="display:none;" />
		<input type="text" name="y" id="y" style="display:none;"/>
		<p class="notclick">....Click somewhere in the screenshot!</p>
		<table style="width:100%">
			<tr>
				<td class="click" style="display:none">
					<button name="button" value="click">Click</button>
				</td>
				<td class="click" style="display:none">
					<button name="button" value="2click">Double Click</button>
				</td>
				<td class="click" style="display:none">
					<button name="button" value="shiftclick">Shift+Click</button>
				</td>
				<td class="click" style="display:none">
					<button name="button" value="right-click">Right Click</button>
				</td>
			</tr>
			<tr>
				<td colspan="4"><textarea type="text" name="text" value="" ></textarea></td>
			</tr>
			<tr>
				<td colspan="4"><button name="button" value="write">Write</button></td>
			</tr>
		</table>


		
	</div>
	<div data-role="content" >	
		<div class="screen" >
		<?php $c=file_get_contents("commando.txt");if($c=="6"){$src="cam";}else{$src="screenshot";}?>
		<img id="screenshot" src="<?=$src?>.png?v=<?=rand(1,200);?>"/></div>	
	</div>

	<div data-role="footer">
		<button class="left">LEFT</button>
		<button class="up">UP</button>
		<button class="down">DOWN</button>
		<button class="right">RIGHT</button>
		<button name="button" value="cam" >Webcam</button>
	</div>
</div>
</div>
</body>
</html>
