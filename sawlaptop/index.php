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
                <li><i class="fa fa-user"></i><a href="index.php"> Alternatif</a></li>
              </ol>
            </div>
          </div>

          <!--START SCRIPT INSERT-->
          <?php
          include 'koneksi.php';

          if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $merek = $_POST['merek'];
            $kategori = $_POST['kategori'];
            if (($nama == "") or ($merek == "")) {
              echo "<script>alert('Tolong Lengkapi Data yang Ada!');</script>";
            } else {
              $sql = "SELECT * FROM saw_laptop WHERE nama='$nama'";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                $row = $hasil->fetch_row();
                echo "<script>alert('Aplikasi $nama Sudah Ada!');</script>";
              } else {
                $sql = "INSERT INTO saw_laptop(nama,merek,kategori)
                values ('" . $nama . "','" . $merek . "','" . $kategori . "')";
                $hasil = $conn->query($sql);
                echo "<script>alert('Data Barhasil diTambahkan!');</script>";
              }
            }
          }
          ?>
          <!-- END SCRIPT INSERT-->

          <!--start inputan-->
          <form method="POST" action="">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Tipe Laptop</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="nama">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Merek Laptop</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="merek">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Kategori Laptop</label>
              <div class="col-sm-5">
                <select class="form-control" name="kategori">
                  <option>Notebook</option>
                  <option>Ultrabook</option>
                  <option>Laptop Gaming</option>
                
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
                <th><i class="fa fa-arrow-down"></i> Tipe Laptop</th>
                <th><i class="fa fa-arrow-down"></i> Merek Laptop</th>
                <th><i class="fa fa-arrow-down"></i> Kategori Laptop</th>
                <th><i class="fa fa-cogs"></i> Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $b = 0;
              $sql = "SELECT*FROM saw_laptop ORDER BY nama ASC";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                while ($row = $hasil->fetch_row()) {
              ?>
                  <tr>
                    <td><?php echo $b = $b + 1; ?></td>
                    <td><?= $row[0] ?></td>
                    <td><?= $row[1] ?></td>
                    <td><?= $row[2] ?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-success" href="alt_ubah.php?nama=<?= $row[0] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="alt_hapus.php?nama=<?= $row[0] ?>"><i class="fa fa-trash"></i></a>
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