<?php
session_start();

mysql_connect("localhost", "root", "");
mysql_select_db("librarie");

include("page_top.php");
include("meniu.php");
$produs_id=$_GET['produs_id'];
$sql = "SELECT produs_nume, produs_descrie, produs_descriecompl, produs_pret FROM produse";
$resursa = mysql_query($sql);
$row = mysql_fetch_array($resursa);
?>
<td valign="top">
<table>
<tr>
<td valign="top">
<?php
$adresaImagine="haine/".$row['produs_nume'].".jpg";
if(file_exists($adresaImagine))
{
print '<img src="'.$adresaImagine.'" width="75" height="100" hspace="10"><br>';
}
?>
</td>
<td valign="top">
<h1><?php print $row['produs_descrie']?></h1>
<i> <b>1 buc</b></i>
<p><i><?php print $row['produs_descriecompl']?></i></p>
<p>Pret:<?php print $row['produs_pret']?> lei</p>
</td>
</tr>
</table>
<br />
<form action="cos.php?actiune=adauga" method="post">
<input type="hidden" name="produs_id" value="<?=$produs_nume?>" />
<input type="hidden" name="produs_nume" value="<?=$row['produs_nume']?>" />
<input type="hidden" name="produs_descrie" value="<?=$row['produs_descrie']?>" />
<input type="hidden" name="produs_pret" value="<?=$row['produs_pret']?>" />
<input type="submit" value="Adauga in cos" />
</form>
<br />
<p><h2>Opiniile cititorilor</h2></p>
<?php
$sqlComentarii = "SELECT * FROM comentarii";
$resursaComentarii = mysql_query($sqlComentarii);
while($row = mysql_fetch_array($resursaComentarii))
{
	print '<div style="width:400px;border:1px solid #dedede; background-color:#f0f0f0; padding:5px"><a href="mailto:'.$row['adresa_email'].'">'.$row['nume_utilizator'].'</a><br>'.$row['comentariu'].'</div>';
}
?>
<br />
<div style="width:400px;border:1px solid #dedede;background-color:#f0f0f0;padding:5px;">
<b>Adauga opinia ta:</b>
<hr size="1" />
<form action="adauga_comentariu.php" method="post">
Nume:<input type="text" name="nume_utilizator" /><br /><br />
Email:<input type="text" name="adresa_email" /><br /><br />
Comentariu:<br />
<textarea name="comentariu" cols="45"></textarea><br /><br />
<input type="hidden" name="id_carte" value="<?=$id_carte?>" />
<center><input type="submit" value="Adauga" /></center>
</form>
</div>
</td>
<?php
include("page_bottom.php");
?>
