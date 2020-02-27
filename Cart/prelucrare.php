<?php
if($_POST['nume'] =="")
{
	print 'Trebuie sa completati numele !
	<a href="cos.php"> Inapoi </a>';
	exit;
}
if($_POST['adresa']=="")
{
	print 'Trebuie sa completati adresa!
	<a href="cos.php"> Inapoi </a>';
	exit;
}
session_start();
$nrProd=array_sum($_SESSION['nr_buc']);
if($nrProd==0)
{
	print 'Trebuie sa cumparati cel putin un produs!
	<a href="cos.php"> Inapoi </a>';
	exit;

}
include("conectare.php");
$sqlTranzactie="INSERT INTO clienti (client_username, client_strada) values('".$_POST['nume']."','".$_POST['adresa']."')";
$resursaTranzactie=mysql_query($sqlTranzactie);
$id_tranzactie=mysql_insert_id();
for($i=0; $i<count($_SESSION['produs_id']); $i++)
{
	if($_SESSION['nr_buc'][$i]>0)
	{
		$sqlVanzare="INSERT INTO cos values ('".$cos_id."','".$_SESSION[''][$i]."','".$_SESSION['cos_produsid'][$i]."')";
		mysql_query($sqlVanzare);

	}
}
$emailDestinatar="rbucur5@gmail.com";
$subiect="O noua comanda!";
$mesaj="O noua comanda de la <b>".$_POST['nume']."</b><br>";
$mesaj.="Adresa: ".$_POST['adresa']."<br>";
$mesaj.="Cartile comandate: <br><br>";
$mesaj.="table border='1' cellspacing='0' cellpadding='4'>";
$totalGeneral=0;
for ($i=0; $i<count($_SESSION['produs_id']); $i++)
{
	if ($_SESSION['nr_buc'][$i]>0)
	{
		$mesaj.="<tr><td>".$_SESSION['produs_nume'][$i]." de ".$_SESSION['produs_descrie'][$i]."</td><td>".$_SESSION['nr_buc'][$i]." buc </td></tr>";
		$totalGeneral=$totalGeneral +($_SESSION['nr_buc'][$i]*$_SESSION['produs_pret'][$i]);
	}
}
$mesaj .="</table>";
$mesaj.="Total: <b>".$totalGeneral."</b>";
$headers="MIME-Version: 1.0\r\nContent-type: tet/html; charset=iso-8859-2\r\n";
@mail($emailDestinatar, $subiect, $mesaj, $headers);
session_unset();
session_destroy();
include("page_top.php");
include("meniu.php");
?>
<td valign="top">
<h1>Multumim! </h1>
Va multumim ca ati cumparat de la noi! Veti primi comanda solicitata in cel mai scurt timp. </td>
<?php
include("page_bottom.php");
?>
