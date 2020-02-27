<?php
session_start();
include("conectare.php");
include("page_top.php");
include("meniu.php");
$cuvant=$_GET['cuvant'];
?>
<td valign="top">
<h1>Rezultatele cautarii: </h1>
<p>Textul cautat: <b><?php echo $cuvant?>
</b></p>
<b>Produs</b>
<blockquote>
<?php
$sql="SELECT produs_nume,produs_descrie FROM produse WHERE produs_nume LIKE '%".$cuvant."%'";
$resursa=mysql_query($sql);
if(mysql_num_rows($resursa) == 0)
{
	print "<i>Niciun rezultat</i>";
}
while($row=mysql_fetch_array($resursa))
{

	print '<a href="produs.php? produs_nume='.$row['produs_nume'].'">'.$row['produs_nume'].'</a><br>';

}
?>
</blockquote>
<b>Pret</b>
<blockquote>
<?php
$sql="SELECT produs_pret, produs_nume FROM produse WHERE produs_pret LIKE '%".$cuvant."%'";
$resursa=mysql_query($sql);
if (mysql_num_rows($resursa) ==0)
{
	print "<i>Niciun rezultat</i>";
}
while ($row=mysql_fetch_array($resursa))
{

	print '<a href="produse.php? produs_pret='.$row['produs_pret'].'">'.$row['produs_nume'].'</a><br>'.$row['produs_pret'].'</a>lei<br>';

}
?>
</blockquote>
<b>Descrieri</b>
<blockquote>
<?php
$sql="SELECT produs_nume, produs_descrie, produs_descriecompl FROM produse WHERE produs_descrie LIKE '%".$cuvant."%'";
$resursa=mysql_query($sql);
if(mysql_num_rows($resursa) == 0)
{
	print "<i>Niciun rezultat </i>";
}
while ($row=mysql_fetch_array($resursa))
{
	print '<a href="produs.php? produs_id='.$row['produs_nume'].'">'.$row['produs_descrie'].'</a><br>'.$row['produs_descriecompl'].'<br><br>';

}
?>
</blockquote>
</td>
<?php
include ("page_bottom.php");
?>
