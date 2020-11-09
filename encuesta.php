<?php
/* Incluimos el fichero de conexi�n
a la base de datos mysql */
require('config.php');

/* Almacenamos en variables los datos del Voto
notemos que se est�n enviando en m�todo POST y
que solo se est�n almacenando 2 variables, el del voto
y el ID de la encuesta
*/
$voto 	= $_POST["voto"];
$encid 	= $_POST["encid"];

/* Actualizamos el registro de la encuesta
donde con "where encid=$encid" identifica el registro
de encuesta a actualizar, en "enctot = enctot+1" 
suma el total de votos  de todas las encuestas 
y por ultimo "encval$voto = encval$voto+1" suma 
el total de votos para la votaci�n seleccionada.
*/
mysqli_select_db($SQLid, $base);
$SQLquery = "UPDATE datos SET encval$voto = encval$voto+1, enctot = enctot+1 where encid=$encid";
$SQLresult = mysqli_query($SQLid, $SQLquery);

/* Luego de actualizar los datos de la votaci�n
mostraremos la estad�stica de la encuesta.
 */
 $SQLquery = "SELECT * FROM datos where encid=$encid";
$result = mysqli_query($SQLid, $SQLquery);
$row = mysqli_fetch_array($result);

/* La estad�stica se mostrara con un l�nea grafica
que no es mas que una imagen gif la cual se alarga 
de acuerdo al porcentaje. Promediando el total de tipo
de encuesta "encval1" por el 100% "*100" entre "/" el 
total de la votos "enctot", como resultado tendremos
ejemplo: 4.444444, ahora si esto lo colocamos en una etiqueta
img se mostrara asi:
<img height="5" width="4.444444%" src="imagenes/barra1.gif" />
Es importante colocar el signo de "%" al final, para que el tama�o
de la imagen se ajuste al valor.
En la parte superior del grafico he mostrado el valor de los botos en %
notaremos que es la misma  operaci�n matem�tica aplicada a diferencia
que le coloco �round(operacion,1)� 
donde "round" redondea el valor si en caso es muy largo como "4.444444"
a solo "1" digito quedando asi "4.4"
 */
?>
<html>
<head>
<title>Encuestas</title>
</head>
<body>
<center>
<font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<strong> RESULTADOS DE LA ENCUESTA<br>
<?php echo $row["encprg"] ?></strong></font>
<table width="500" border="0" cellpadding="2" cellspacing="2" bgcolor="#CCCCCC">
<tr>
<td width="91"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?php echo $row["encrpt1"]?>
</font></td>
<td width="299">
<font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?php echo round($row["encval1"]*100/$row["enctot"],1)?> %
</font><br>
<img height="5" width="<?php echo $row["encval1"]*100/$row["enctot"]?>%" src="imagenes/barra1.gif" />
</td>
<td width="98"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<b><? echo $row["encval1"]?></b> votos</font></td>
</tr>
<tr>
<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?php echo $row["encrpt2"]?></font>
</td>
<td>
<font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?php echo round($row["encval2"]*100/$row["enctot"],1)?> %
</font><br><img height="5" width="<?php echo $row["encval2"]*100/$row["enctot"]?>%" src="imagenes/barra2.gif" /></td>
<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>
<?php echo $row["encval2"]?>
</b> votos</font></td>
</tr>
<tr>
<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?php echo $row["encrpt3"]?></font></td>
<td>
<font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?php echo round($row["encval3"]*100/$row["enctot"],1)?> %
</font><br>
<img height="5" width="<?php echo $row["encval3"]*100/$row["enctot"]?>%" src="imagenes/barra3.gif" /></td>
<td>
<font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>
<?php echo $row["encval3"]?>
</b> votos</font></td>
</tr>
<tr>
<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?php echo $row["encrpt4"]?></font></td>
<td>
<font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?php echo round($row["encval4"]*100/$row["enctot"],1)?> %</font><br>
<img height="5" width="<?php echo $row["encval4"]*100/$row["enctot"]?>%" src="imagenes/barra4.gif" /></td>
<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>
<?php echo $row["encval4"]?>
</b> votos</font></td>
</tr>
</table>
<font size="2" face="Verdana, Arial, Helvetica, sans-serif">
Total de votos: <b><?php echo $row["enctot"]?></b></font>
</center>
</body>
</html>  