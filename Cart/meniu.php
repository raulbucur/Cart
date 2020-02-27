<td valign="top" width="125">
	<div style="width: 120px; background-color: #7394B5; padding:4px; border: solid #632415 1px">
	<b>Alege categoria</b><HR size="1">
		<?php
		$sql="SELECT * FROM produse ORDER BY produs_categorie ASC";
		$resursa=mysql_query($sql);
		while($row=mysql_fetch_array($resursa))
		{
			print '<a href="domeniu.php?produs_categorie='.$row['produs_categorie'].'">'.$row['produs_categorie'].'</a><br>';
		}
		?>
	</div><br>
	<div style="width:120px; background-color: #7394B5; padding:4px; border:solid #632415 1px">
		<form action="cautare.php" method="GET">
			<b>Cautare</b><br>
			<INPUT type="text" name="cuvant" size="12"><br>
			<INPUT type="submit" value="Cauta">
		</form>
	</div>
	<br>
	<div style="width:120px; background-color:#7394B5; padding:4px; border:solid #632415 1 px">
	<b>Cos</b><br>
	<?php
	$nrProd=0;
	$totalValoare=0;
	if(isset($_SESSION['produs_nume'])&& isset($_SESSION['nr_buc'])&& isset($_SESSION['produs_pret']))
	{
	for($i=0; $i<count($_SESSION['produs_id']); $i++)
	{
		$nrProd=$nrProd+$_SESSION['nr_buc'][$i];
		$totalValoare=$totalValoare+($_SESSION['nr_buc'][$i]*$_SESSION['produs_pret'][$i]);
	}
	}
	?>
	Aveti <b><?=$nrProd?></b> produse in cos, in valoare totala de <b><?=$totalValoare?></b> lei.
	<a href="cos.php"> Click aici pentru a vedea continutul cosului! </a>
	</div>
</td>
