<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LPKN | Soal Ujian</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url()?>ujian_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>ujian_assets/dist/css/adminlte.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=base_url()?>ujian_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
</head>
<body class="hold-transition layout-top-nav" onload="window.print()">
  <div class="wrapper">
    <h2 class="text-center font-weight-bold">Ujian Pilihan Ganda</h2>
    <div class="card-body h5">
      <h4 class="font-weight-bold">I.  Unit Kompetensi Menelaah Lingkungan Pengadaan Barang dan Jasa</h4>
      <ol type="1">
        <?php foreach ($soal_1 as $soal) { $no = 1; ?>
          <li><?=$soal->soal?></li>
          <div class="row ml-2">
            <div class="col-sm-6">
              <div class="row mb-2">
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="a_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('a');" value="a" required <?=$soal->pg=='a'?'checked':''?>>
                  <label style="font-weight: 500;" for="a_<?=$soal->soal?>">
                    <ol type="a" start="a" style="margin-left: -19px" <?=$soal->jk=='a'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->ja?> <?=$soal->jk=='a'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="b_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('b');" value="b" required <?=$soal->pg=='b'?'checked':''?>>
                  <label style="font-weight: 500;" for="b_<?=$soal->soal?>">
                    <ol type="a" start="2" style="margin-left: -19px" <?=$soal->jk=='b'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jb?> <?=$soal->jk=='b'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row mb-2">
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="c_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('c');" value="c" required <?=$soal->pg=='c'?'checked':''?>>
                  <label style="font-weight: 500;" for="c_<?=$soal->soal?>">
                    <ol type="a" start="3" style="margin-left: -19px" <?=$soal->jk=='c'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jc?> <?=$soal->jk=='c'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="d_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('d');" value="d" required <?=$soal->pg=='d'?'checked':''?>>
                  <label style="font-weight: 500;" for="d_<?=$soal->soal?>">
                    <ol type="a" start="4" style="margin-left: -19px" <?=$soal->jk=='d'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jd?> <?=$soal->jk=='d'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </ol>

      <h4 class="font-weight-bold">II.  Unit Kompetensi Menyusun Kebutuhan dan Anggaran Pengadaan Barang dan Jasa</h4>
      <ol type="1" start="5">
        <?php foreach ($soal_2 as $soal) { $no = 1; ?>
          <li><?=$soal->soal?></li>
          <div class="row ml-2">
            <div class="col-sm-6">
              <div class="row mb-2">
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="a_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('a');" value="a" required <?=$soal->pg=='a'?'checked':''?>>
                  <label style="font-weight: 500;" for="a_<?=$soal->soal?>">
                    <ol type="a" start="a" style="margin-left: -19px" <?=$soal->jk=='a'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->ja?> <?=$soal->jk=='a'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="b_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('b');" value="b" required <?=$soal->pg=='b'?'checked':''?>>
                  <label style="font-weight: 500;" for="b_<?=$soal->soal?>">
                    <ol type="a" start="2" style="margin-left: -19px" <?=$soal->jk=='b'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jb?> <?=$soal->jk=='b'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row mb-2">
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="c_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('c');" value="c" required <?=$soal->pg=='c'?'checked':''?>>
                  <label style="font-weight: 500;" for="c_<?=$soal->soal?>">
                    <ol type="a" start="3" style="margin-left: -19px" <?=$soal->jk=='c'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jc?> <?=$soal->jk=='c'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="d_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('d');" value="d" required <?=$soal->pg=='d'?'checked':''?>>
                  <label style="font-weight: 500;" for="d_<?=$soal->soal?>">
                    <ol type="a" start="4" style="margin-left: -19px" <?=$soal->jk=='d'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jd?> <?=$soal->jk=='d'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </ol>

      <h4 class="font-weight-bold">III. Unit Kompetensi Memilih Penyedia Barang dan Jasa</h4>
      <ol type="1" start="9">
        <?php foreach ($soal_3 as $soal) { $no = 1; ?>
          <li><?=$soal->soal?></li>
          <div class="row ml-2">
            <div class="col-sm-6">
              <div class="row mb-2">
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="a_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('a');" value="a" required <?=$soal->pg=='a'?'checked':''?>>
                  <label style="font-weight: 500;" for="a_<?=$soal->soal?>">
                    <ol type="a" start="a" style="margin-left: -19px" <?=$soal->jk=='a'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->ja?> <?=$soal->jk=='a'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="b_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('b');" value="b" required <?=$soal->pg=='b'?'checked':''?>>
                  <label style="font-weight: 500;" for="b_<?=$soal->soal?>">
                    <ol type="a" start="2" style="margin-left: -19px" <?=$soal->jk=='b'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jb?> <?=$soal->jk=='b'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row mb-2">
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="c_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('c');" value="c" required <?=$soal->pg=='c'?'checked':''?>>
                  <label style="font-weight: 500;" for="c_<?=$soal->soal?>">
                    <ol type="a" start="3" style="margin-left: -19px" <?=$soal->jk=='c'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jc?> <?=$soal->jk=='c'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="d_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('d');" value="d" required <?=$soal->pg=='d'?'checked':''?>>
                  <label style="font-weight: 500;" for="d_<?=$soal->soal?>">
                    <ol type="a" start="4" style="margin-left: -19px" <?=$soal->jk=='d'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jd?> <?=$soal->jk=='d'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </ol>

      <h4 class="font-weight-bold">IV.  Unit Kompetensi Menyusun Dokumen Pengadaan Barang dan Jasa</h4>
      <ol type="1" start="13">
        <?php foreach ($soal_4 as $soal) { $no = 1; ?>
          <li><?=$soal->soal?></li>
          <div class="row ml-2">
            <div class="col-sm-6">
              <div class="row mb-2">
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="a_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('a');" value="a" required <?=$soal->pg=='a'?'checked':''?>>
                  <label style="font-weight: 500;" for="a_<?=$soal->soal?>">
                    <ol type="a" start="a" style="margin-left: -19px" <?=$soal->jk=='a'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->ja?> <?=$soal->jk=='a'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="b_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('b');" value="b" required <?=$soal->pg=='b'?'checked':''?>>
                  <label style="font-weight: 500;" for="b_<?=$soal->soal?>">
                    <ol type="a" start="2" style="margin-left: -19px" <?=$soal->jk=='b'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jb?> <?=$soal->jk=='b'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row mb-2">
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="c_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('c');" value="c" required <?=$soal->pg=='c'?'checked':''?>>
                  <label style="font-weight: 500;" for="c_<?=$soal->soal?>">
                    <ol type="a" start="3" style="margin-left: -19px" <?=$soal->jk=='c'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jc?> <?=$soal->jk=='c'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="d_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('d');" value="d" required <?=$soal->pg=='d'?'checked':''?>>
                  <label style="font-weight: 500;" for="d_<?=$soal->soal?>">
                    <ol type="a" start="4" style="margin-left: -19px" <?=$soal->jk=='d'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jd?> <?=$soal->jk=='d'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </ol>

      <h4 class="font-weight-bold">V. Unit Kompetensi Melakukan Kualifikasi Penyedia Barang dan Jasa</h4>
      <ol type="1" start="18">
        <?php foreach ($soal_5 as $soal) { $no = 1; ?>
          <li><?=$soal->soal?></li>
          <div class="row ml-2">
            <div class="col-sm-6">
              <div class="row mb-2">
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="a_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('a');" value="a" required <?=$soal->pg=='a'?'checked':''?>>
                  <label style="font-weight: 500;" for="a_<?=$soal->soal?>">
                    <ol type="a" start="a" style="margin-left: -19px" <?=$soal->jk=='a'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->ja?> <?=$soal->jk=='a'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="b_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('b');" value="b" required <?=$soal->pg=='b'?'checked':''?>>
                  <label style="font-weight: 500;" for="b_<?=$soal->soal?>">
                    <ol type="a" start="2" style="margin-left: -19px" <?=$soal->jk=='b'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jb?> <?=$soal->jk=='b'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row mb-2">
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="c_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('c');" value="c" required <?=$soal->pg=='c'?'checked':''?>>
                  <label style="font-weight: 500;" for="c_<?=$soal->soal?>">
                    <ol type="a" start="3" style="margin-left: -19px" <?=$soal->jk=='c'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jc?> <?=$soal->jk=='c'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="d_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('d');" value="d" required <?=$soal->pg=='d'?'checked':''?>>
                  <label style="font-weight: 500;" for="d_<?=$soal->soal?>">
                    <ol type="a" start="4" style="margin-left: -19px" <?=$soal->jk=='d'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jd?> <?=$soal->jk=='d'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </ol>

      <h4 class="font-weight-bold">VI.  Mengevaluasi Dokumen Penawaran</h4>
      <ol type="1" start="22">
        <?php foreach ($soal_6 as $soal) { $no = 1; ?>
          <li><?=$soal->soal?></li>
          <div class="row ml-2">
            <div class="col-sm-6">
              <div class="row mb-2">
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="a_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('a');" value="a" required <?=$soal->pg=='a'?'checked':''?>>
                  <label style="font-weight: 500;" for="a_<?=$soal->soal?>">
                    <ol type="a" start="a" style="margin-left: -19px" <?=$soal->jk=='a'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->ja?> <?=$soal->jk=='a'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="b_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('b');" value="b" required <?=$soal->pg=='b'?'checked':''?>>
                  <label style="font-weight: 500;" for="b_<?=$soal->soal?>">
                    <ol type="a" start="2" style="margin-left: -19px" <?=$soal->jk=='b'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jb?> <?=$soal->jk=='b'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row mb-2">
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="c_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('c');" value="c" required <?=$soal->pg=='c'?'checked':''?>>
                  <label style="font-weight: 500;" for="c_<?=$soal->soal?>">
                    <ol type="a" start="3" style="margin-left: -19px" <?=$soal->jk=='c'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jc?> <?=$soal->jk=='c'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
                <div class="icheck-success d-inline col-12 col-md-12">
                  <input type="radio" id="d_<?=$soal->soal?>" name="soal_<?=$soal->soal?>" onclick="pilihJawaban('d');" value="d" required <?=$soal->pg=='d'?'checked':''?>>
                  <label style="font-weight: 500;" for="d_<?=$soal->soal?>">
                    <ol type="a" start="4" style="margin-left: -19px" <?=$soal->jk=='d'?'class="text-success font-weight-bold"':''?>>
                      <li><?=$soal->jd?> <?=$soal->jk=='d'?'<i class="fa fa-check"></i>':''?></li>
                    </ol>
                  </label>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </ol>

      <div class="col-md-12">
        <div class="text-right mb-5">
          <table border="1" align="right" cellpadding="10" width="10%" cellspacing="0" style="border-collapse:collapse;">
            <thead>
              <tr>
                <td width="50%" class="h2">NILAI</td>
                <td width="50%" class="h2"><?=$nilai?></td>
              </tr>
            </thead>
          </table>
        </div>
        <br/>
        <br/>
        <br/>
        <table border="1" cellpadding="10" width="100%" cellspacing="0" style="border-collapse:collapse;">
          <thead>
            <tr>
              <td valign="top" width="20%">Umpan Balik Untuk Asesi</td>
              <td height="100px"></td>
            </tr>
          </thead>
        </table>
        <br/>
        <table border="1" cellpadding="10" width="100%" cellspacing="0" style="border-collapse:collapse;">
          <thead>
            <tr>
              <td width="20%">Nama</td>
              <td valign="top" width="40%">Asesi<br/><b><?=$peserta->nama_lengkap?></b></td>
              <td valign="top" width="40%">Asesor</td>
            </tr>
            <tr>
              <td valign="top">Tanda Tangan dan Tanggal</td>
              <td height="150px"></td>
              <td></td>
            </tr>
          </thead>
        </table>
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?=base_url()?>ujian_assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?=base_url()?>ujian_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>ujian_assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url()?>ujian_assets/dist/js/demo.js"></script>
  </body>
  </html>
