<?php
  include 'koneksi.php';
session_start();


  $query = "SELECT * FROM tb_siswa;";
  $sql = mysqli_query($conn, $query );
  $no = 0;
  

  //var_dump($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>belajar_crud</title>
    <!-- bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css" />
    <link rel="icon" href="img/icon.png" />
    <!-- data tables -->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.css" />
    <script type ="text/javascript" src="datatables/datatables.js"></script>

  <head>

<script type="text/javascript">
 $(document).ready(function(){
  $('#dt').DataTable();
 });

 </script>

</>

  <body>
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"> CRUD-BS5  <br> <br> 
        
        <figcaption class="blockquote-footer">
          CRUD <cite title="Source Title">Create, Read, Update and Delete &  Bootstrap <cite title="Source Title">5</cite></cite> <br>
          
        </figcaption> </a> 
      
        
      </div>
    </nav>

    <!-- JUDUL -->
    <div class="container">
      <h1 class="mt-4">Data Siswa <br> SEKOLAH ISLAM DIAS </h1>
      <figure>
        <blockquote class="blockquote">
          <p>Data yang telah disimpan</p>
        </blockquote>
        
      </figure>
      <a href="kelola.php" type="button" class="btn btn-primary mb-3"
        ><i class="fa fa-plus"></i> tambah data</a>

        <?php
        if(isset($_SESSION['eksekusi'])):
        ?>

      <div class="alert alert-success alert-dismissible fade show" role="alert">
      
          <?php
          echo $_SESSION['eksekusi'];
          ?>
      
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="alert"
          aria-label="Close"
        ></button>
      </div>
        <?php
        session_destroy();
           endif;
        ?>

      <div class="table-responsive">
        <table id="dt" class="table align-middle table-bordered table-hover">
          <thead>
            <tr>
              <th><center>No.</center></th>
              <th><center>NISN</center></th>
              <th>Nama Siswa</th>
              <th>Jenis Kelamin</th>
              <th><center>Foto</center></th>
              <th>Alamat</th>
              <th><center>Aksi</center></th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($result = mysqli_fetch_assoc($sql)){
            ?>
            <tr>
              <td>
                <center>
                  <?php
                echo ++$no;
                ?>.
                </center>
              </td>
              <td>
                <center>
                  <?php
                echo $result['nisn'];
                ?>
                </center>
              </td>
              <td>
                <?php
                echo $result['nama_siswa'];
                ?>
              </td>
              <td>
                <?php
                echo $result['jenis_kelamin'];
                ?>
              </td>
              <td>
              <center>
                <img
                  style="width: 100px; height: 70px"
                  src="img/<?php
              echo $result['foto'];
              ?>"
                />
              </center>
              </td>
              <td>
                <?php
                echo $result['alamat'];
                ?>
              </td>
              <td>
              <center>
                <a
                  href="kelola.php?ubah=  <?php
                echo $result['id_siswa'];
                ?>"
                  type="button"
                  class="btn btn-success btn-sm"
                >
                  <i class="fa fa-pencil"></i>
                </a>
                <a
                  href="proses.php?hapus=  <?php
                echo $result['id_siswa'];
                ?>"
                  type="button"
                  class="btn btn-danger btn-sm"
                  onClick="return confirm('Apakah anda yakin untuk menghapus data ini???')"
                >
                  <i class="fa fa-trash"></i>
                </a>
              </center>
              </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
          <tbody>
            <!-- <tr>
              <td><center>2.</center></td>
              <td>23</td>
              <td>Moci</td>
              <td>laki-laki</td>
              <td><img src="img/c.jpg" style="width: 100px" /></td>
              <td>Semarang</td>
              <td>
                <a href="kelola.php?ubah=2" type="button" class="btn btn-success btn-sm">
                  <i class="fa fa-pencil"></i>
                </a>
                <a href="proses.php?hapus=2" type="button" class="btn btn-danger btn-sm">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr> -->
          </tbody>
        </table>
      </div>
    </div>
    <div style="margin-bottom: 90px"></div>
  </body>
</html>
