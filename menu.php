<html>
<head>
	<title></title>
	<style type="text/css">

	html, body, div, iframe { margin:0; padding:0; height:100%; }
	        BODY{
 	       font-family: Calibri;
        	} 
	a:link, a:visited {
		text-decoration: none
	}
	a:hover {
	text-decoration: underline; 
	color: #f00
	}
	a:active {
	text-decoration: none
	}

		td {
			color: red;
			font-size: 10;
                background-color: #F5ECCE;
		}
		
		td:hover {    
                border: 2px solid rgb(220, 110, 0);
                background-color: #BCF5A9;
		}


	</style>
</head>
<body bgcolor=#000000 text=#ffffff>
<center>

<table border="0" cellpadding="0" cellspacing="10">
<tr>

<td  width=80 height=80><center>
	<a href="http://localhost/fusion/all.php?age=query&IP=<?php echo $_GET['IP']; ?>" border=0 target="painel"><img src="img/status.png" alt="Status" height=70><br><span>Status</span></a>
</td>
<td  width=80 height=80><center>
	<a href="http://localhost/fusion/all.php?age=start&IP=<?php echo $_GET['IP']; ?>" border=0 target="painel"><img src="img/start.png" alt="Start" height=70><br><span>Start</span></a>
</td>
<td  width=80 height=80><center>
	<a href="http://localhost/fusion/all.php?age=stop&IP=<?php echo $_GET['IP']; ?>" border=0 target="painel"><img src="img/stop.ico" alt="Stop" height=70><br><span>Stop</span></a>
</td>
<td  width=80 height=80><center>
	<a href="http://<?php echo $_GET['IP']; ?>:62354/now" border=0 target="painel"><img src="img/inventario.png" alt="Inventário" height=70><br><span>Inventário</span></a>
</td>
</tr>
</table>
<center><b>Acesso para <?php echo $_GET['IP']; ?>.</b></center>