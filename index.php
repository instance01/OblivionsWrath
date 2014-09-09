<?php ob_start("ob_gzhandler"); ?>
<?php
include("config.php");
connect();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="author" content="InstanceLabs">
<meta name="description" content="OblivionsWrath MineCraft Server">
<title>OblivionsWrath</title>
<!-- Accidentally hit CTRL+U? -->
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="s/css/semantic.min.css">
<link rel="stylesheet" type="text/css" href="index.css">
<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="s/javascript/s.js"></script>
<script type="text/javascript" src="s/javascript/jquery.address.js"></script>
<script type="text/javascript">

$(document).ready(function(){

	$('.main.menu .item').tab();
	$('a.red').click(function(e) {
		$('.main.menu .item').tab('change tab', 'home');
	});
	$('a.players').click(function(e) {
		$('.main.menu .item').tab('change tab', 'players');
	});
	$('a.shop').click(function(e) {
		$('.main.menu .item').tab('change tab', 'shop');
	});
	$('a.forum').click(function(e) {
		$('.main.menu .item').tab('change tab', 'forum');
	});
	
	setTimeout(function(){
		$('.sidebar').sidebar('toggle');
	}, 500);

	$(".player").popup({
		on: 'hover'
	})
	
	$(".player_").popup({
		on: 'hover'
	})
	
	$('#search').keyup(function(e){
		if(e.keyCode == 13)
		{
			$(".player_").css("box-shadow", "0px 0px 0px #000000");
			var f = $("#search").val().toLowerCase();
			$('.player_').each(function() {
				var id = this.id.toLowerCase();
				if(id.indexOf(f) != -1){
					$("#" + this.id).effect("pulsate");
					$("#" + this.id).css("box-shadow", "0 0 3px 3px #0044AA");
				}
			});
		}
	});
});

</script>

</head>
<body>

<div class="ui inverted main menu">
	<a class="active item" data-tab="home">
	<i class="home icon"></i> Home
	</a>
	<a class="item players" data-tab="players">
	Players
	</a>
	<a class="item shop" data-tab="shop">
	Shop
	</a>
	<a class="item forum" data-tab="forum">
	Forum
	</a>
	<div class="ui dropdown item">
		Account <i class="dropdown icon"></i>
		<div class="menu">
		  <a class="item">Register</a>
		  <a class="item">Login</a>
		</div>
	</div>
</div>

<div class="ui thin styled floating sidebar">

<?php

	$count = 0;
	$query = mysql_query("SELECT * FROM players WHERE online='1'")or die(mysql_error());

	$str = "";
	
	while($row2 = mysql_fetch_array($query))
	{
		$count += 1;
		$str .= " <img src='face.php?u=" . $row2['player'] ."&s=32' class='player' data-variation='small inverted' title='".$row2['player']."' />";
	}

	function ping($host, $c, $port=25565, $timeout=1) {
		$status = "STATUS: <font color='#00FF00'>ONLINE</font>!<br>";
		set_error_handler(function() { 
			$status = "STATUS: <font color='#FF0000'>OFFLINE</font>!<br>";
		});
		try {
			$handle = fsockopen($host, $port, $errno, $errstr, $timeout);
			if($handle != null){
				fwrite($handle, "\xFE");
				$d = fread($handle, 256);
				
				if ($d[0] != "\xFF") return array('motd' => "", 'players' => "?", 'max_players' => "?");
				$d = substr($d, 3);
				$d = mb_convert_encoding($d, 'auto', 'UCS-2');
				$d = explode("\xA7", $d);
				fclose($handle);
			} else { 
				$status = "STATUS: <font color='#FF0000'>OFFLINE</font>!<br>";
			}
		} catch(Exception $e) {
			$status = "STATUS: <font color='#FF0000'>OFFLINE</font>!<br>";
		}
		restore_error_handler();
		
		echo("IP: 216.224.176.67<br>");
		echo($status);
		echo("PLAYERS: $c/94<br>");
		//echo("MOTD: $d[0]");
		//return array('motd' => $d[0], 'players' => (int)$d[1], 'max_players' => (int)$d[2]);
	}

	ping("127.0.0.1", $count);

	echo("<br>");
	if($count < 1){
		$str = "No players online.";
	}
	echo($str);


?>

</div>


<div class="ui active tab" data-tab="home">
<center>
<img src="logo.png"></img>
</center>
</div>

<div class="ui tab" data-tab="players">

<center>
<div class="row">
	<table class="table">
         <tr><td>Judge</td>
         <td>
         <img id='OblivionsWrath' src='face.php?u=OblivionsWrath&s=32' class='player_' data-variation='small inverted' style='margin: 5px' data-toggle='tooltip' title='OblivionsWrath' />
         <img id='xephosfan12' src='face.php?u=xephosfan12&s=32' class='player_' data-variation='small inverted' style='margin: 5px' data-toggle='tooltip' title='xephosfan12' />
         </td>
         </tr>
         <tr><td>Tech-Support</td>
         <td>
		 <img id='hades700' src='face.php?u=hades700&s=32' class='player_' data-variation='small inverted' style='margin: 5px' data-toggle='tooltip' title='Hades700' style="cursor: pointer" />
         <img id='InstanceLabs' src='face.php?u=InstanceLabs&s=32' class='player_' data-variation='small inverted' style='margin: 5px' data-toggle='tooltip' title='InstanceLabs' style="cursor: pointer" />
         </td>
         </tr>
         <tr><td>IDK</td>
         <td>
         <img id='bilbobx182' src='face.php?u=bilbobx182&s=32' class='player_' data-variation='small inverted' style='margin: 5px' data-toggle='tooltip' title='bilbobx182' />
         <img id='tschomb78' src='face.php?u=tschomb78&s=32' class='player_' data-variation='small inverted' style='margin: 5px' data-toggle='tooltip' title='tschomb78' />
         </td>
         </tr>
	</table>
</div>
<hr>
<div class="row">
	<div class="ui small icon input">
	  <input placeholder="Search player" id="search" type="text">
	  <i class="search icon"></i>
	</div>
</div>
<div class="row">
	<br>
	<?php
		$query = mysql_query("SELECT * FROM players")or die(mysql_error());
		$str = "";
		while($row2 = mysql_fetch_array($query))
		{
			$count += 1;
			$str .= " <img src='face.php?u=" . $row2['player'] ."&s=32' id='".$row2['player']."' class='player_' data-variation='small inverted' title='".$row2['player']."' />";
		}
		echo($str);
	?>
</div>
</center>
</div>

<div class="ui tab" data-tab="shop">

//TODO: Shop

</div>

<div class="ui tab" data-tab="forum">

//TODO: Forum

</div>

</body>
</html>