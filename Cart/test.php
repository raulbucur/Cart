<?php
$con=mysql_connect("localhost", "root", "");
mysql_select_db($con,"librarie1");
     $count=1;
     $sql="SELECT * from produse";
     $resursa = mysql_query($sql);
     while($row=mysql_fetch_array($resursa))
     { ?>
     <tr><td align="center"><?php echo $count;?></td>
     <td><?php echo $row["produs_id"]; ?></td>
     <td><?php echo $row["produs_nume"]; ?></td>
     <td><?php echo $row["produs_pret"]; ?></td>


    <?php $count++; }?>
