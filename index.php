<?php
/* Incluimos el fichero de conexi�n
a la base de datos mysql */
require('config.php');
/* Generamos una consulta
en la base de datos mysql, donde se mostraran
los datos de la encuesta, en la tabla Datos 
podemos almacenar diversos tipos de encuestas y cada uno tendr�
su propio ID de identificaci�n, para este ejemplo 
sera "encid = 1"
 */
mysqli_select_db($SQLid, $base);
$query = "SELECT encid, encprg, encrpt1, encrpt2, encrpt3, encrpt4 FROM datos where encid = 1";
$result = mysqli_query($SQLid, $query);
$row = mysqli_fetch_array($result);
/* 
A continuaci�n mostramos los datos con "$row"
donde "0" es el ID, "1" el titulo y del 2 al 5
los nombres de la encuesta
Es importante mostrar el ID de la encuesta
para identificar a que encuesta se esta promediando
 */
?>

<html>
<head>
<title>Encuestas</title>
</head>
<body>
<form name="form1" method="post" action="encuesta.php">
<input type=hidden name="encid" value="<?php echo $row[0] ?>">
<br>  
<table width="300" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#CCCCCC">
 <tr>
 <td colspan="2" bgcolor="#666666"><div align="center">
<font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">
Encuestas </font> </div>
</td>
 </tr>
 <tr>
 <td colspan="2"><div align="center">
<font size="2" face="Verdana, Arial, Helvetica, sans-serif">
 <strong> <?php echo $row[1]?> </strong></font>
</div>
</td>
</tr>
<tr>
<td width="20"><input name="voto" type="radio" value="1" checked="checked" /></td><td width="272">
<font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?php echo $row[2]?></font></td>
</tr>
<tr>
<td><input type="radio" name="voto" value="2" /></td>
<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?php echo $row[3]?>
</font></td>
 </tr>
  <tr> 
<td><input type="radio" name="voto" value="3" /></td>
 <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?php echo $row[4]?> </font>
</td>
 </tr>
 <tr>
 <td><input type="radio" name="voto" value="4" /></td>
 <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<?php echo $row[5]?> </font>
</td>
</tr>
<tr>
<td colspan="2"><div align="center">
<input type="submit" name="Submit" value="Enviar" />
</div></td>
</tr>
</table>
</form>
</body>
</html>