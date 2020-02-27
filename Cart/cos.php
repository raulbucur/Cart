<?php
session_start();
include("conectare.php");
include("page_top.php");
include("meniu.php");
//$actiune=$_GET['actiune'];
if (isset($_GET['actiune']) && $_GET['actiune']=="adauga")
{
	$_SESSION['produs_id'][]=$_POST['produs_id'];
	$_SESSION['produs_denumire'][] = $_POST['produs_denumire'];
	$_SESSION['produs_pret'][] = $_POST['produs_pret'];
	$_SESSION['nr_buc'][]=1;
}
if(isset($_GET['actiune']) && $_GET['actiune']=="modifica")
{
	for ($i=0; $i<count($_SESSION['produs_id']); $i++)
	{
		$_SESSION['nr_buc'][$i]=$_POST['noulNrBuc'][$i];
	}
}
?>
<td valign="top">
<h1> Cosul de cumparaturi </h1>
<form action="cos.php?actiune=modifica" method="POST">
<table border="1" cellspacing="0" cellpadding="4">
<tr bgcolor="#F9F1E7">
<td><b>Nr. buc </b></td>
<td><b>Produs </b></td>
<td><b>Pret </b></td>
<td><b>Total</b></td>
</tr>
<?php
$totalGeneral = 0;
for($i=0; $i<count($_SESSION['produs_id']); $i++)
{
	if($_SESSION['nr_buc'][$i] !=0)
	{
	print '<tr><td><input type="text" name="noulNrBuc['.$i.']" size="1" value="'.$_SESSION['nr_buc'][$i].'">
	</td>
	<td><b>'.$_SESSION['produs_denumire'][$i].'</b> Tricou '.'</td>
	<td align="right">'.($_SESSION['produs_pret'][$i]).' lei </td>
	<td align="right">'.($_SESSION['produs_pret'][$i]*$_SESSION['nr_buc'][$i]).'lei </td></tr>';
	$totalGeneral=$totalGeneral+($_SESSION['produs_pret'][$i]*$_SESSION['nr_buc'][$i]);
	}
}
print '<tr><td align="right" colspan="3"><b>Total in cos </b></td><td align="right"><b>'.$totalGeneral.'</b> lei </td></tr>';
?>
</table>
<input type="submit" value="Modifica"><br><br>Introduceti <b>0</b> pentru produsele care doriti sa le scoateti din cos!
<h1>Continuare </h1>
<table>
<tr><td width="200" align="center">
<img src="cos.gif" width="45" height="45"><br>
<a href="index.php">Continua cumparaturile </a></td>
<td width="200" align="center">
<img src="casa.gif" width="45" height="45"><br>
<a href="casa.php">Mergi la casa</a></td></tr>
</table>
</td>
<?php
include ("page_bottom.php");
?>
