<?php ob_start("ob_gzhandler"); ?>
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

	$(".logo").popup('toggle').popup({'on': 'click'});
	
});

</script>

</head>
<body>

<a href="site.php"><img src="logo.png" class="logo" title="Click to enter" data-variation="inverted"></img></a>

</body>
</html>