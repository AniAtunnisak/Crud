<?php 
    //Koneksi Database
    $server = "localhost"; 
    $user = "root";
    $pass = "";
    $database = "dblatihan";

    $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

    //jika tombol simpan diklik
    if(isset($_POST['bsimpan']))
    {
      $simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nama, prodi, jurusan, absen)
                                        VALUES ('$_POST[tnama]', 
                                                '$_POST[tprodi]', 
                                                '$_POST[tjurusan]', 
                                                '$_POST[tabsen]')669
                                       ");
      if($simpan) //jika simpan sukses
      {
          echo "<script>
                  alert('simpan data Suksess!');
                  document.location= 'index.php';
                </script>";
      }
      else 
      {
        echo  "<script>
                  alert('simpan data GAGAL!!');
                  document.location= 'index.php';
              </script>";  
      }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD SISWA</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <h1 class="text-center"> SMKN 1 PURWOSARI </h1>  
    <h2 class="text-center"> Jurusan RPL </h2>  

    <!--Awal.Card.Form --> 
    <div class="card mt-3">
      <div class="card-header bg-info text-white">
        Form Data Siswa-Siswi
      </div>
      <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label> Nama </lebel>
                <input type="text" name="tnama" class="form-control" placeholder="Input Nama Anda!" required>
              </div>
              <div class="form-group">
                  <label> Kelas </lebel>
                  <select class="form-control" name="tprodi">
                      <option></option>
                      <option value="X RPL">X RPL</option>
                      <option value="XI RPL">XI RPL</option>
                      <option value="XII RPL">XII RPL</option>
                  </select>
              </div>
              <div class="form-group">
                  <label> Jurusan </lebel>
                  <input type="text" name="tjurusan" class="form-control" placeholder="Input Jurusan Anda!" required>
              </div>
              <div class="form-group">
                  <label> Absen </lebel>
                  <input type="text" name="tabsen" class="form-control" placeholder="Input Absen Anda!" required>
              </div>
              
              <button type="submit" class="btn btn-warning text-white" name="bsimpan">Save</button>
              <button type="reset" class="btn btn-danger" name="breset">Deled</button>
              
        </form>          
    </div>
</div>
<!--Akhir.Card.Form --> 

<!--Awal.Card.Tabel --> 
<div class="card mt-3">
        <div class="card-header bg-dark text-white">
          Form Daftar Siswa-Siswi
        </div>
        <div class="card-body">
         
          <table class="table table-bordered table-striped">
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Jurusan</th>
              <th>Absen</th>
              <th>Aksi</th>
            </tr>
            <?php
                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_mhs desc");
                while($data = mysqli_fetch_array($tampil)) :

            ?>
            <tr>
              <td><?=$no++;?></td>
              <td><?=$data['nama']?></td>
              <td><?=$data['kelas']?></td>
              <td><?=$data['jurusan']?></td>
              <td><?=$data['absen']?></td>
              <td>
                  <a href="#" class="btn btn-warning"> Edit </a>
                  <a href="#" class="btn btn-danger"> Deled </a>
              </td>
            </tr>
                <?php endwhile; //penutup perulangan while ?>
          </table>
    </div>
</div>
<!--Akhir.Card.Tabel --> 


 </div>
<script type="text /javascript" src="js/bootstrap.min.css"></script>
</body>
</html>