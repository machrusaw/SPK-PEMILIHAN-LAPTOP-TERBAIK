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
                <li><i class="fa fa-sticky-note"></i><a href="kriteria.php"> Kriteria</a></li>
              </ol>
            </div>
          </div>

          <!--START SCRIPT HITUNG-->
          <script>
function fungsiku() {
  var a = Number((document.getElementById("penyimpanan_param").value).substring(1, 2));
  var b = Number((document.getElementById("harga_param").value).substring(1, 2));
  var c = Number((document.getElementById("processor_param").value).substring(1, 2));
  var d = Number((document.getElementById("ram_param").value).substring(1, 2));
  var e = Number((document.getElementById("layar_param").value).substring(1, 2));
  var f = Number((document.getElementById("vga_param").value).substring(1, 2));

  // Menghitung total
  var total = a + b + c + d + e + f;

  // Memastikan total bukan nol sebelum melakukan pembagian
  if (total !== 0) {
    document.getElementById("penyimpanan").value = (a / total).toFixed(2);
    document.getElementById("harga").value = (b / total).toFixed(2);
    document.getElementById("processor").value = (c / total).toFixed(2);
    document.getElementById("ram").value = (d / total).toFixed(2);
    document.getElementById("layar").value = (e / total).toFixed(2);
    document.getElementById("vga").value = (f / total).toFixed(2);
  } else {
    // Tindakan yang diambil jika total sama dengan nol
    // Misalnya, menampilkan pesan kesalahan atau melakukan tindakan alternatif
  }
}

          </script>
          <!--END SCRIPT HITUNG-->


          <!--START SCRIPT INSERT-->
          <?php

          include 'koneksi.php';

          if (isset($_POST['submit'])) {
            $penyimpanan = $_POST['penyimpanan'];
            $harga = $_POST['harga'];
            $processor = $_POST['processor'];
            $ram = $_POST['ram'];
            $layar = $_POST['layar'];
            $vga = $_POST['vga'];
            if (($penyimpanan == "") or
              ($harga == "") or
              ($processor == "") or
              ($ram == "") or
              ($layar == "") or
              ($vga == "")
            ) {
              echo "<script>
              alert('Tolong Lengkapi Data yang Ada!');
              </script>";
            } else {
              $sql = "SELECT * FROM saw_kriteria";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                echo "<script>
                alert('Hapus Bobot Lama untuk Membuat Bobot Baru');
                </script>";
              } else {
                $sql = "INSERT INTO saw_kriteria(
                  penyimpanan,harga,processor,ram,layar,vga)
                  values ('" . $penyimpanan . "',
                  '" . $harga . "',
                  '" . $processor . "',
                  '" . $ram . "',
                  '" . $layar . "',
                  '" . $vga . "')";
                $hasil = $conn->query($sql);
                echo "<script>
                alert('Bobot Berhasil di Inputkan!');
                </script>";
              }
            }
          }
          ?>
          <!-- END SCRIPT INSERT-->


          <!--start inputan-->
          <form class="form-validate form-horizontal" id="register_form" method="post" action="">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label"><b>Kriteria</b></label>
              <div class="col-sm-3">
                <label><b>Bobot</b></label>
              </div>
              <div class="col-sm-2">
                <label><b>Perbaikan Bobot</b></label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Penyimpanan</label>
              <div class="col-sm-3">
                <select class="form-control" name="penyimpanan_param" id="penyimpanan_param">
                  <option>(1) Sangat Ringan</option>
                  <option>(2) Ringan</option>
                  <option>(3) Sedang</option>
                  <option>(4) Berat</option>
                  <option>(5) Sangat Berat</option>

                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="penyimpanan" id="penyimpanan">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Harga</label>
              <div class="col-sm-3">
                <select class="form-control" name="harga_param" id="harga_param">
                 <option>(1) Sangat Ringan</option>
                  <option>(2) Ringan</option>
                  <option>(3) Sedang</option>
                  <option>(4) Berat</option>
                  <option>(5) Sangat Berat</option>

                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="harga" id="harga">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Processor</label>
              <div class="col-sm-3">
                <select class="form-control" name="processor_param" id="processor_param">
                  <option>(1) Sangat Sedikit</option>
                  <option>(2) Sedikit</option>
                  <option>(3) Sedang</option>
                  <option>(4) Banyak</option>
                  <option>(5) Sangat Banyak</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="processor" id="processor">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">RAM</label>
              <div class="col-sm-3">
                <select class="form-control" name="ram_param" id="ram_param">
                  <option>(1) Sangat Sedikit</option>
                  <option>(2) Sedikit</option>
                  <option>(3) Sedang</option>
                  <option>(4) Banyak</option>
                  <option>(5) Sangat Banyak</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="ram" id="ram">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Layar</label>
              <div class="col-sm-3">
                <select class="form-control" name="layar_param" id="layar_param">
                  <option>(1) Sangat Sedikit</option>
                  <option>(2) Sedikit</option>
                  <option>(3) Sedang</option>
                  <option>(4) Banyak</option>
                  <option>(5) Sangat Banyak</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="layar" id="layar">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">VGA</label>
              <div class="col-sm-3">
                <select class="form-control" name="vga_param" id="vga_param">
                  <option>(1) Sangat Sedikit</option>
                  <option>(2) Sedikit</option>
                  <option>(3) Sedang</option>
                  <option>(4) Banyak</option>
                  <option>(5) Sangat Banyak</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="vga" id="vga">
              </div>
              <div class="col-sm-2">
                <button class="btn btn-outline-success" type="button" id="hitung" onclick="fungsiku()" name="hitung"><i class="fa fa-calculator"></i> Hitung</button>
              </div>
            </div>
            <div class="mb-4">
              <button class="btn btn-outline-primary" type="submit" name="submit"><i class="fa fa-save"></i> Submit</button>
            </div>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th><i class="fa fa-arrow-down"></i> Penyimpanan</th>
                <th><i class="fa fa-arrow-down"></i> Harga</th>
                <th><i class="fa fa-arrow-down"></i> Processor</th>
                <th><i class="fa fa-arrow-down"></i> RAM</th>
                <th><i class="fa fa-arrow-down"></i> Layar</th>
                <th><i class="fa fa-arrow-down"></i> VGA</th>
                <th><i class="fa fa-cogs"></i> Opsi</th>
              </tr>
            </thead>
            <?php
            $b = 0;
            $sql = "SELECT * FROM saw_kriteria";
            $hasil = $conn->query($sql);
            $rows = $hasil->num_rows;
            if ($rows > 0) {
              while ($row = $hasil->fetch_row()) {
            ?>
                <tr>
                  <td Align="center"><?= $row[1] ?></td>
                  <td Align="center"><?= $row[2] ?></td>
                  <td Align="center"><?= $row[3] ?></td>
                  <td Align="center"><?= $row[4] ?></td>
                  <td Align="center"><?= $row[5] ?></td>
                  <td Align="center"><?= $row[6] ?></td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-danger" href="kriteria_hapus.php?id=<?= $row[0] ?>"><i class="fa fa-close"></i></a>
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