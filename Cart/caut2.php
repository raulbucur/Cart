<form action="caut2.php" method="GET">
  <b>Cautare</b><br>
  <INPUT type="text" name="cuvant" size="10"><br>
  <INPUT type="submit" value="Cauta">
</form>
<?php
session_start();
include("conectare.php");
$cuvant=$_GET['cuvant'];
?>
<p>Textul cautat: <b><?php echo $cuvant?>
<?php
$sql="SELECT * FROM produse,clienti,cos WHERE * LIKE '%".$cuvant."%'";
$resursa=mysql_query($sql);
if(mysql_num_rows($resursa) == 0)
{
	print "<i>Niciun rezultat</i>";
}
while($row=mysql_fetch_array($resursa))
{

	print '<a href="produse.php? produs_nume='.$row['produs_nume'].'">'.$row['produs_nume'].'</a><br>';

}
?>
