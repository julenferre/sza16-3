<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head> 
		<title>Lab3.2-Iruzkinak ikusi</title> 
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<style>
			body{background-color:#FABADA;overflow:auto;}
			h1,a{font-weight:bold;}
			table,th,td{border: 3px solid white;}
			td,th{padding: 15px; text-align:center;}
			th{
				font:Verdana;
				color:#ffff00;
				background-color:#000000;
			}
			td{background-color:#d3d3d3;}
			#imgL,#imgR{
				position: absolute;
				top: 10%;
			}
			#imgL{
				left: 8%;
			}
			#imgR{
				right: 8%;
			}
		</style>
		<script>
			var i = 0;
			var irudiak = ["guitar.png","bass.png","drums.png","hand-rock.png"];
			window.setInterval(function (){				
				document.getElementById("irudia1").src="../img/"+irudiak[i];
				document.getElementById("irudia2").src="../img/"+irudiak[i];
				i = i + 1;
				if(i > 3){
					i = 0;
				}
			}, 500);
		</script>
		<script src="../Javascript/baliostapenak.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</head> 
	<body> 
		<center>
			<h1>WEB ORRIA</h1>
			<form id="f1" name="f1" method="get" onsubmit="return checkAll2()" action="./erabIruzkinakIkusi.php">
				Eposta: <input type="text" id="eposta" name="eposta"/>
				<input type="submit" value="Bilatu"/>
			</form><br><br>
			<?php
			if(isset($_GET['eposta'])){
				$bisitak = simplexml_load_file('../XML/bisita_liburua.xml');
				echo ("<table>");
				echo ("<tr><th><b>Mezua</b></th><th><b>Data</b></th></tr>");
				foreach ($bisitak->xpath('//bisita') as $bisita)
				{
					if($_GET['eposta']==$bisita->eposta){
						echo("<td>$bisita->iruzkina</td>");		
						echo("<td>$bisita->data</td></tr>");
					}
				}
				echo ("</table>");
			}
			?>
		<br />
		<br />
		<div id="imgL"><img id="irudia1" src="../img/hand-rock.png" /></div>
		<div id="imgR"><img id="irudia2" src="../img/hand-rock.png" /></div>
		<br />
		<br />
		<a href="../PHP/iruzkinakIkusi.php">Iruzkin guztiak ikusi</a><br><br>
		<a href="../HTML/iruzkinakSartu.html">-=HOME=-</a><br>
		</center>
		
	</body> 
</html>
