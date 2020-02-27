<?php
include ("conectare.php");
include ("page_top.php");
include ("meniu.php");
$produs_categorie = $_GET['produs_categorie'];
$sqlNumeDomeniu = "SELECT produs_categorie FROM produse";
$resursaNumeDomeniu = mysql_query($sqlNumeDomeniu);
$numeDomeniu = mysql_result($resursaNumeDomeniu,0,"produs_categorie");
?>

<td valign="top">
<h1>Categorie <?php echo $numeDomeniu?></h1>
<b>Produse
<u><i><?php echo $numeDomeniu?></i></u>:</b>
<table cellpadding="5">
<?php
$sql = "SELECT produs_nume, produs_descriecompl,produs_categorie FROM produse";
$resursa = mysql_query($sql);
while ($row=mysql_fetch_array($resursa))
{
 ?>
 <tr>
  <td align="center">
  <?php
  $adresaImagine="haine/".$row['produs_nume'].".jpg";
  if (file_exists($adresaImagine))
  {
   print '<img src="'.$adresaImagine.'" width="75" height="100"> <br>';
  }
  else
  {
   print '<div style="width:75px; height:100px; border:1px black solid; background-color:#cccccc"> Fara imagine </div>';
  }
  ?>
  </td>
  <td>
   <b><a href="produs.php? produs_id=<?php echo $row['produs_id']?>">
   <?php echo $row['produs_nume']?> </a></b><br>
   <i> <?php echo $row['produs_descriecompl']?> </i>
   <br>Pret: <?php echo $row['produs_pret']?> lei
  </td>
 </tr>
 <?php
}
?>
  </table>
 </td>
 <?php
 include ("page_bottom.php");
?>
