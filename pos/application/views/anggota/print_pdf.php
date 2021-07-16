<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
</head>
<body>
<center><h1>Laporan Anggota</h1></center>
<br>
<table border="1" style="border-collapse: collapse; width:80%; text-align: center;margin-left: 15%;">
	<tr>
		<th>Id anggota</th>
		<th>Nama Anggota</th>
		<th>Alamat</th>
		<th>No telepon</th>
		<th>Persyaratan</th>
	</tr>
	<?php
        foreach($laporan as $s){
        ?>
        <tr style="text-align: left;">
          <td><?php echo $s->id_anggota?></td>
          <td><?php echo $s->nama_anggota?></td>
          <td><?php echo $s->alamat?></td>
          <td><?php echo $s->no_tlp?></td>
          <td><?php echo $s->persyaratan?></td>
        <?php
        }
        ?>	
</table>
</body>
</html>