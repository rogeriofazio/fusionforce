<head>
<style type="text/css">

	BODY{
        font-family: Calibri;
        } 
		
		table {
	    border:solid 1px;
		border-radius:0px 20px 0px 20px;
		background: #FFFFFF;
		}

	#menu {
		margin:0;
		position:fixed;
		top:100	;
		width:100;
		height:200px;
		padding: 0;
	}
</style>
</head>

<body bgcolor=#000000>
<ul id=menu>

<table>
<TR><TD>Legenda: </TD></TR>
<TR><td bgcolor='#81DAF5'>IMPRESSORA</TD></TR>
<TR><td bgcolor='#F3F781'>SWITCH</TD></TR>
<TR><td bgcolor='#64FE2E'>SERVIDOR</TD></TR>
</table>
</ul>

<center>
<h2><font color=#ffffff>Sistema para inventário de rede usando o FusionInventory.</h2>
<table>
<?php
// Iniciamos o "contador"
list($usec, $sec) = explode(' ', microtime());
$script_start = (float) $sec + (float) $usec;


$SomaPING=0;
$Soma=0;


function Monta_dir($dir_name){

	$dir = "/mnt/FusionTest";
	 
	if(!file_exists($dir)){ 	
	mkdir("$dir", 0777);
	}
		// crie um arquivo cifspasswd contendo em uma linha o usuário de rede e na outra a senha para mapear a pasta.
	$Montagem = exec("sudo mount -t cifs -o credentials=/etc/cifspasswd '$dir_name' /mnt/FusionTest ; mount | grep -i '/mnt/FusionTest'");
	
	if ($Montagem == "") {
			echo "erro";
		}else{
			
		if(file_exists("/mnt/FusionTest/FusionInventory-Agent/")) {
			echo "Sim";
		}else{
			echo "Não";
		}
		
			$Montagem = exec("sudo umount /mnt/FusionTest");
		}
			
	}


function ping($IP,$PORTA){
	global $SomaPING;
    $IPAddress = $IP;
    $Port = $PORTA;
    $fp=@fsockopen ($IPAddress,135, $errno, $errstr,(float)0.5);
    if(!$fp) {
        echo "<font color=#D8D8D8>".$IP."</font>";
		echo "</td><td>";
        }
    else {
		$SomaPING++;
		Inventaria($IP,"62354");

        fclose($fp);

        }
    }


function Inventaria($IP,$PORTA){
	global $Soma;
    $IPAddress = $IP;
    $Port = $PORTA;
    $fp=@fsockopen ($IPAddress,$Port, $errno, $errstr,(float)0.5);
    if(!$fp) {
        echo "<a href='menu.php?IP=$IP' target='menu'><font color=red><b>".$IP."<b></font></a>";
		echo "</td><td>";
		Monta_dir("//$IP/c$/Program Files/");
        }
    else {
		$Soma++;
        echo "<font color=green><b>".$IP."<b></font>";
		echo "</td><td>";
        echo "<iframe src='http://$IP:62354/now' width='30px' height='20px' frameborder='0' marginheight='0' marginwidth='0' scrolling='no' ></iframe>";
        fclose($fp);

        }
    }


for ($i = 1; $i <= 255; $i++) { 
//for ($i = 0; $i <= 1015; $i++) { 
	if ($i >= 100 AND $i <= 119) {
		$cor = "bgcolor='#81DAF5'";
		$cor2 = "";
	}else if ($i >= 200 AND $i <= 230) {
		$cor = "bgcolor='#F3F781'";
		$cor2 = "bgcolor='#64FE2E'";	
	}else{
		$cor = "";
		$cor2 = "";
		
		
	}


echo "<tr ".$cor."><td>";
ping("10.75.16.$i");


echo "</td>";

echo "<td>";
ping("10.75.17.$i");

echo "</td>";


echo "<td>";
ping("10.75.18.$i");

echo "</td>";

echo "<td ".$cor2.">";
ping("10.75.19.$i");

echo "</td>";



}
fclose($fp);


// Terminamos o "contador" e exibimos
list($usec, $sec) = explode(' ', microtime());
$script_end = (float) $sec + (float) $usec;
$elapsed_time = round($script_end - $script_start, 5);

$total = $elapsed_time;
$horas = floor($total / 3600);
$minutos = floor(($total - ($horas * 3600)) / 60);
$segundos = floor($total % 60);



?>
</table>
<br><br><font color=#ffffff>
<?php echo "<h1>" . $SomaPING . " respondem ao PING e ".$Soma. " máquinas com FusionInventory.</h1>"; ?>
<br><br>

<?php
// Exibimos uma mensagem
echo 'Tempo de execução: '. $horas . ":" . $minutos . ":" . $segundos . '. <br>Memória usada: ', round(((memory_get_peak_usage(true) / 1024) / 1024), 2), 'Mb';
?>
<br>By: Rogerio Fazio - 16/05/2019
