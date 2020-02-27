<?php
session_start();
include("conectare.php");
include("page_top.php");
include("meniu.php");
?>
<td valign="top">
<h1>Prima pagina</h1>
<b>Cele mai noi produse</b>
<table cellpadding="5">
<tr>
<?php
$sql="SELECT produs_nume, produs_descrie, produs_descriecompl, produs_pret FROM produse  ORDER BY produs_pret DESC";
$resursa=mysql_query($sql);
while($row=mysql_fetch_array($resursa))
{
print '<td align="center">';
$adresaImagine="haine/".$row['produs_nume'].".jpg";
if(file_exists($adresaImagine))
{
print '<img src="'.$adresaImagine.'" width = "75" height="100"><br>';
}
else
{
print '<div style = "width:75px; height:100px; border: 1px black solid; background-color: #CCCCCC"> Fara Imagine </div>';
}
print '<b><a href="produs.php?produs_nume='.$row['produs_nume'].'">'.$row['produs_nume'].'</a></b><br><i>'.$row['produs_descriecompl'].'</i><br> Pret: '.$row['produs_pret'].' lei </td>';
}
?>
</tr>
</table>
<hr>
<b> Cele mai vandute</b>
<table cellpadding="5">
<tr>
  <?php
  $sql="SELECT produs_nume, produs_descrie, produs_descriecompl, produs_pret FROM produse LIMIT 0,2";
  $resursa=mysql_query($sql);
  while($row=mysql_fetch_array($resursa))
  {
  print '<td align="center">';
  $adresaImagine="haine/".$row['produs_nume'].".jpg";
  if(file_exists($adresaImagine))
  {
  print '<img src="'.$adresaImagine.'" width = "75" height="100"><br>';
  }
  else
  {
  print '<div style = "width:75px; height:100px; border: 1px black solid; background-color: #CCCCCC"> Fara Imagine </div>';
  }
  print '<b><a href="produs.php?produs_nume='.$row['produs_nume'].'">'.$row['produs_nume'].'</a></b><br><i>'.$row['produs_descriecompl'].'</i><br> Pret: '.$row['produs_pret'].' lei </td>';
  }
  ?>
</tr>
</table>
</td>
<tr>
</table>
<?php
include("page_bottom.php");
?>
