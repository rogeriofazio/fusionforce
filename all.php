<head>
<style type="text/css">

		BODY{
        font-family: Calibri;
        } 
		
</style>
</head>

<body bgcolor=#000000 TEXT=#ffffff>
<?php

	$IP = $_GET['IP'];

	if ($_GET['age'] == "query") {
		echo "<pre><font size=5>".utf8_encode(shell_exec("sc \\\\$IP queryex FusionInventory-Agent"))."</pre>";
	}else if ($_GET['age'] == "start") {
		echo "<pre><font size=5>".utf8_encode(shell_exec("sc \\\\$IP start FusionInventory-Agent"))."</pre>";
	}else if ($_GET['age'] == "stop") {
		echo "<pre><font size=5>".utf8_encode(shell_exec("sc \\\\$IP stop FusionInventory-Agent"))."</pre>";
	}else{
		echo "Nenhuma ação solicitada.";
	}
?>