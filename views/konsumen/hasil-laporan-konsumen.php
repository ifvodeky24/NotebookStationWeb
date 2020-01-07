<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  /*text-align: left;    */
}
table#t01 {
  width: 100%;    
  background-color: #f1f1c1;
}

</style>

<!-- <label style="font-size:17px;font-family:'Times New Roman', Times, serif;">
  Barang atau pekerjaan tersebut telah diterima dan diselesaikan dengan baik oleh :
</label> -->

<div id="centrar">
 <b><p style="text-align: center;font-size:16px;">
   LAPORAN DATA KONSUMEN<br>
   SENAPELAN COMPUTER</p>
</div>

 <table style="width:100%" border="1" style='font-family:"Courier New", Courier, monospace; font-size:10%'>
  <tr>
    <th>No.</th>
    <th>Nama Konsumen</th> 
    <th>Username</th>
    <th>Email</th>
    <th>Nomor Handphone</th>
    <th>Alamat</th>
    
    
  </tr>
  <?php 

$no=1; foreach ($modelasset as $value) {?>
  <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $value['nama_lengkap']?></td>
      <td><?php echo $value['username']?></td>
      <td><?php echo $value['email']?></td>
      <td><?php echo $value['nomor_hp']?></td>
      <td><?php echo $value['alamat']?></td>
       
    </tr>
  <?php 
  $no++; }
 ?>
  
</table>
<br>
<p style="margin-left:590px; font-size:10px;font-family:'Times New Roman', Times, serif;">
  Mengetahui, <br> Manager HRD
</p>
<br>
<p style="margin-left:590px; font-size:10px;font-family:'Times New Roman', Times, serif;">
  (Nama Lengkap) 
</p>