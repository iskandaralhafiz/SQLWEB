<?php 
    include "koneksi.php";
    
    $sel_prov="select KODE_DESA, DESA from tbl_desa where KECAMATAN='".$_POST["kec"]."'";
    $q=sqlsrv_query($conn,$sel_prov);
    while($data_prov=sqlsrv_fetch_array($q)){
    
    ?>
        <option value="<?php echo $data_prov["KODE_DESA"] ?>"><?php echo $data_prov["DESA"] ?></option><br>
    
    <?php
    }
    ?>
   
