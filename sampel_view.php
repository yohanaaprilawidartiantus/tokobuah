<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
<p>NICE</p>
<table>
<?php foreach ($products as $key -> $value) { ?>
<tr>
<td><?php echo $value->id_dokter; ?></td>
<td><?php echo $value->nama; ?></td>
<td><?php echo $value->spesialis; ?></td>
<td><?php echo $value->alamat; ?></td>
</tr>
<?php } ?>
</table>
</body>

</html>