<!doctype html>
<html lang="en">

<?php
include 'components/head.php';
?>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <?php
    include 'components/sidebar.php';
    ?>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

      <?php
      include 'components/navbar.php';
      ?>

      <section id="main-content">
        <section class="wrapper">
          <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <ol class="breadcrumb">
                <li><i class="fa fa-list-ol"></i><a href="penilaian.php"> Penilaian</a></li>
              </ol>
            </div>
          </div>

          <!--START SCRIPT INSERT-->
          <?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $penyimpanan = substr($_POST['penyimpanan'], 0, 1);
  $harga = substr($_POST['harga'], 0, 1);
  $processor = substr($_POST['processor'], 0, 1);
  $ram = substr($_POST['ram'], 0, 1);
  $layar = substr($_POST['layar'], 0, 1);
  $vga = substr($_POST['vga'], 0, 1);

  if ($penyimpanan == "" || $harga == "" || $processor == "" || $ram == "" || $layar == "" || $vga == "") {
    echo "<script>
          alert('Tolong Lengkapi Data yang Ada!');
          </script>";
  } else {
    $sql = "SELECT * FROM saw_penilaian WHERE nama='$nama'";
    $hasil = $conn->query($sql);
    $rows = $hasil->num_rows;
    
    if ($rows > 0) {
      $row = $hasil->fetch_row();
      echo "<script>
            alert('Aplikasi $nama sudah ada!');
            </script>";
    } else {
      //insert name
      $sql = "INSERT INTO saw_penilaian(nama, penyimpanan, harga, processor, ram, layar, vga) 
              VALUES ('$nama', '$penyimpanan', '$harga', '$processor', '$ram', '$layar', '$vga')";
      $hasil = $conn->query($sql);
      
      if ($hasil) {
        echo "<script>
              alert('Penilaian Berhasil di Tambahkan!');
              window.location.href = 'penilaian.php';
              </script>";
      } else {
        echo "<script>
              alert('Terjadi kesalahan saat menambahkan penilaian!');
              </script>";
      }
    }
  }
}
?>

          <!-- END SCRIPT INSERT-->

          <!--start inputan-->
          <form method="POST" action="">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Alternatif</label>
              <div class="col-sm-4">
                <select class="form-control" name="nama">
                  <?php
                  //load nama
                  $sql = "SELECT * FROM saw_laptop";
                  $hasil = $conn->query($sql);
                  $rows = $hasil->num_rows;
                  if ($rows > 0) {
                    while ($row = mysqli_fetch_array($hasil)) :; {
                      } ?> <option><?php echo $row[0]; ?></option>
                  <?php endwhile;
                  } ?>
                </select>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Penyimpanan</label>
              <div class="col-sm-4">
                <select class=" form-control" name="penyimpanan" id="penyimpanan">
                  
                  <option>1. Sangat Rendah (8GB & 16GB)</option>
                  <option>2. Rendah (32GB & 64GB)</option>
                  <option>3. Cukup (128GB)</option>
                  <option>4. Tinggi (512Gb)</option>
                  <option>5. Sangat Tinggi (1TB)</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Harga</label>
              <div class="col-sm-4">
                <select class=" form-control" name="harga">

                  <option>1. Sangat Rendah (Rp 4.500.000 - Rp 6.999.999)</option>
                  <option>2. Rendah (Rp 7.000.000 - Rp 9.999.999)</option>
                  <option>3. Cukup (Rp 10.000.000 - Rp 13.999.999)</option>
                  <option>4. Tinggi (Rp 14.000.000 - Rp 17.999.999)</option>
                  <option>5. Sangat Tinggi (Rp 18.000.000 - Rp 24.999.999)</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Processor</label>
              <div class="col-sm-4">
                <select class=" form-control" name="processor">

                  <option>1. Sangat Rendah (Intel Celeron N4020, Core i3, AMD Athlon )</option>
                  <option>2. Rendah (Intel Core i5, AMD A-Series, Intel Xeon)</option>
                  <option>3. Cukup (Intel Core i7, AMD Ryzen 3, AMD Ryzen 5)</option>
                  <option>4. Tinggi (Intel Core i9, Chip Apple M2, AMD Ryzen 7)</option>
                  <option>5. Sangat Tinggi (Apple M1, AMD Ryzen 9, AMD Ryzen 7 Pro)</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">RAM</label>
              <div class="col-sm-4">
                <select class=" form-control" name="ram">

                  <option>1. Sangat Rendah (4GB)</option>
                  <option>2. Rendah (8GB)</option>
                  <option>3. Cukup (16GB)</option>
                  <option>4. Tinggi (32)</option>
                  <option>5. Sangat Tinggi (64GB)</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Layar</label>
              <div class="col-sm-4">
                <select class=" form-control" name="layar">

                  <option>1. Sangat Rendah (8 inch)</option>
                  <option>2. Rendah (12 inch)</option>
                  <option>3. Cukup (14 inch)</option>
                  <option>4. Tinggi (17 inch)</option>
                  <option>5. Sangat Tinggi (18 inch)</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">VGA</label>
              <div class="col-sm-4">
                <select class=" form-control" name="vga">

                  <option>1. Sangat Rendah (Integrated Graphics, Intel UHD Graphics, AMD Radeon RX 5500M)</option>
                  <option>2. Rendah (NVIDIA GeForce GTX 1050, NVIDIA GeForce GTX 1660 Ti, AMD Radeon RX 6600M)</option>
                  <option>3. Cukup (NVIDIA GeForce GTX 1650, Intel Iris Xe Graphics, NVIDIA GeForce GTX 1650 Super)</option>
                  <option>4. Tinggi (NVIDIA GeForce RTX 3060, NVIDIA GeForce RTX 3060, NVIDIA GeForce RTX 3060 Mobile)</option>
                  <option>5. Sangat Tinggi (NVIDIA GeForce RTX 3070, NVIDIA GeForce RTX 3090 Ti)</option>
                </select>
              </div>
            </div>
            <div class="mb-4">
              <button type="submit" name="submit" class="btn btn-outline-primary"><i class="fa fa-save"></i> Submit</button>
            </div>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th><i class="fa fa-arrow-down"></i> No</th>
                <th><i class="fa fa-arrow-down"></i> Alternatif</th>
                <th><i class="fa fa-arrow-down"></i> Penyimpanan</th>
                <th><i class="fa fa-arrow-down"></i> Harga</th>
                <th><i class="fa fa-arrow-down"></i> Processor</th>
                <th><i class="fa fa-arrow-down"></i> RAM</th>
                <th><i class="fa fa-arrow-down"></i> Layar</th>
                <th><i class="fa fa-arrow-down"></i> VGA</th>
                <th><i class="fa fa-cogs"></i> Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $b = 0;
              $sql = "SELECT*FROM saw_penilaian ORDER BY nama ASC";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                while ($row = $hasil->fetch_row()) {
              ?>
                  <tr>
                    <td align="center"><?php echo $b = $b + 1; ?></td>
                    <td><?= $row[0] ?></td>
                    <td align="center"><?= $row[1] ?></td>
                    <td align="center"><?= $row[2] ?></td>
                    <td align="center"><?= $row[3] ?></td>
                    <td align="center"><?= $row[4] ?></td>
                    <td align="center"><?= $row[5] ?></td>
                    <td align="center"><?= $row[6] ?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-danger" href="penilaian_hapus.php?nama=<?= $row[0] ?>">
                          <i class="fa fa-close"></i></a>
                      </div>
                    </td>
                  </tr>
              <?php }
              } else {
                echo "<tr>
                    <td>Data Tidak Ada</td>
                <tr>";
              } ?>
            </tbody>
          </table>
        </section>
      </section>
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>