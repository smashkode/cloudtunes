<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<!-- Website Design By: www.happyworm.com -->
<title>Default Radio Station [Demo]</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
body {
  background-color: #ffffff;
}
</style>
<link href="dist/skin/plyr/plyr.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function(){
setInterval(function(){
//$("#jp-nowplaying").load('streaminfo.php'),
$("#album-box").load(location.href + " #album-box");
}, 15000);
});
</script>
</head>
<body>
<audio id="player" controls>
  <source src="http://192.168.39.22:30420/default0.ogg" type="audio/ogg" />
</audio>
<div id="album-box" style="background-image:url('<?php require_once "albumart.php"; ?>'); background-repeat: no-repeat; background-position: center bottom;">
</body>
</html>
