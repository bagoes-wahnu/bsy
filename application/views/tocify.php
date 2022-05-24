<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tocify by Greg Franko</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/vendor.bundle.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.bundle.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme-a.css">

    <link href="<?php echo base_url();?>assets/tocify/styles/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/tocify/src/stylesheets/jquery.tocify.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:500,600" rel="stylesheet">
  </head>

  <body>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span4">
          <div id="toc">
          </div>
        </div>
        <div class="span8">
          <h2>Pendahuluan</h2>
          <p>
            API - QCA merupakan <i>middleware</i> dari <strong>Quality Control Application</strong> agar dapat digunakan di platform lain layaknya <i>Android</i>.
          </p>
        
          <h2>Tipe-tipe Kembalian</h2>
          <p>
            Setiap transaksi menggunakan API pada Aplikasi QC akan ada respon berupa <code>json</code> yang berisi <code>status</code> dimana status ini memiliki beberapa tipe sebagai berikut:
          </p>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th style="text-align: center;">No</th>
                  <th>Tipe Status</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="text-align: center;">1</td>
                  <td><code>OK</code></td>
                  <td>Proses transaksi berhasil</td>
                </tr>
                <tr>
                  <td style="text-align: center;">2</td>
                  <td><code>ERROR</code></td>
                  <td>Proses transaksi tidak berhasil</td>
                </tr>
                <tr>
                  <td style="text-align: center;">3</td>
                  <td><code>DATA_ALREADY_EXIST</code></td>
                  <td>Data yang diinputkan sudah ada di <i>database</i></td>
                </tr>
                <tr>
                  <td style="text-align: center;">4</td>
                  <td><code>NOT_FOUND</code></td>
                  <td>Data yang diminta tidak ditemukan</td>
                </tr>
                <tr>
                  <td style="text-align: center;">5</td>
                  <td><code>DATA_IS_REQUIRED</code></td>
                  <td>Data yang dikirim, wajib diisi semua</td>
                </tr>
                <tr>
                  <td style="text-align: center;">6</td>
                  <td><code>MISSING_KEY</code></td>
                  <td><code>key</code> wajib diisi</td>
                </tr>
                <tr>
                  <td style="text-align: center;">7</td>
                  <td><code>ACCESS_DENIED</code></td>
                  <td>Akses ditolak. Bisa disebabkan oleh beberapa alasan.<br>(1) <code>key</code> tidak sesuai dengan yang ada di <i>database</i>, atau (2) hak akses dari <code>key</code> tidak sesuai</td>
                </tr>
                <tr>
                  <td style="text-align: center;">8</td>
                  <td><code>PASSWORD_INCORRECT</code></td>
                  <td>Password yang diinputkan tidak benar</td>
                </tr>
                <tr>
                  <td style="text-align: center;">9</td>
                  <td><code>ACCOUNT_INACTIVE</code></td>
                  <td>Akun sudah di-non-atif-kan oleh <strong>Admin</strong></td>
                </tr>
              </tbody>
            </table>
          </div>

          <h2>API - Login</h2>
          <p>
            Transaksi <i>Login</i> merupakan transaksi autentikasi data untuk mengetahui jejak rekam pengguna. Adapun ketentuan yang harus dipenuhi dalam melakukan transaksi <i>Login</i>
          </p>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th style="text-align: center;">No</th>
                  <th>Parameter</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="text-align: center;">1</td>
                  <td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/syb/api/Auth/login</a></u></td>
                  <td>Url untuk mengakses API</td>
                </tr>
                <tr>
                  <td style="text-align: center;">2</td>
                  <td><code>username</code></td>
                  <td>Merupakan nama parameter yang harus dikirim beserta nilainya (username) dengan metode <code>POST</code></td>
                </tr>
                <tr>
                  <td style="text-align: center;">3</td>
                  <td><code>password</code></td>
                  <td>Merupakan nama parameter yang harus dikirim beserta nilainya (password) dengan metode <code>POST</code></td>
                </tr>
                <tr>
                  <td style="text-align: center;">4</td>
                  <td><code>token</code></td>
                  <td>Merupakan nama parameter yang harus dikirim beserta nilainya (token) dengan metode <code>POST</code> yang mana token merupakan hasil <i>generate</i> dari platform pengguna</td>
                </tr>
              </tbody>
            </table>
          </div>

          <h2>API - Company Profile</h2>
          <p>
            Berikut ini adalah bagaimana cara menerapkan API Project pada salah satu project yang akan dikerjakan terkait Aplikasi Quality Control.
          </p>

          <div style="padding-left: 15px;">
            <h3>Mendapatkan List Struktur Modal dan Bagan Struktur Organisasi</h3>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Parameter</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/syb/api/Struktur_modal</a></u></td>
                    <td>Url untuk mengakses API</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td><code>key</code></td>
                    <td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <h3>Mendapatkan Struktur Organisasi</h3>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="text-align: center;">No</th>
                    <th>Parameter</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align: center;">1</td>
                    <td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/syb/api/Struktur_organisasi</a></u></td>
                    <td>Url untuk mengakses API</td>
                  </tr>
                  <tr>
                    <td style="text-align: center;">2</td>
                    <td><code>key</code></td>
                    <td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <h3>Mendapatkan List Wilayah Jaringan Kantor</h3>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="text-align: center;">No</th>
                    <th>Parameter</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align: center;">1</td>
                    <td><code>url</code> : <u><a href="javascript:;#">http://demo.energeek.co.id/syb/api/Jaringan_kantor/</a></u></td>
                    <td>Url untuk mengakses API</td>
                  </tr>
                  <tr>
                    <td style="text-align: center;">2</td>
                    <td><code>key</code></td>
                    <td>Merupakan nama parameter yang harus dikirim beserta nilainya (key) dengan metode <code>POST</code></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="<?php echo base_url();?>assets/tocify/libs/jquery/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/tocify/libs/jqueryui/jquery-ui-1.9.1.custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/tocify/javascripts/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/tocify/src/javascripts/jquery.tocify.js"></script>
    <script>
        $(function() {
          var toc = $("#toc").tocify({
            selectors: "h2,h3,h4,h5"
          }).data("toc-tocify");

          prettyPrint();
          $(".optionName").popover({ trigger: "hover" });
        });
    </script>
  </body>
</html>

<style>
  #toc{margin-top: 5px;}

  .tocify{
    margin-left: 0px;
    width: 30%;
    border:transparent;
    border-radius: 2px;
    background-color: #f5f5f5;
  }

  .nav-list > li > a{
    font-family: 'Poppins', sans-serif;
    color: #7f8c8d;
  }

  .nav-list > .active > a, .nav-list > .active > a:hover{
    background-color: #e74c3c;
    color: #fff;
  }

  h2{
    margin-top: 0px;
    font-family: 'Montserrat', sans-serif;
    letter-spacing: -0.3px;
    font-size: 22px;
    margin-bottom: 0px;
    font-weight: 500;
  }

  h3{
    margin-top: 0px;
    font-family: 'Montserrat', sans-serif;
    letter-spacing: -0.3px;
    font-size: 20px;
    margin-bottom: 0px;
    font-weight: 500;
  }

  .table-responsive table tbody tr td,
  p{
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    letter-spacing: -0.3px;
  }

  .table-responsive table tbody tr td{vertical-align: middle;}

  p strong{color: #e74c3c;}

  .table-responsive table thead tr th{
    font-family: 'Montserrat', sans-serif;
    text-transform: uppercase;
    font-size: 14px;
  }
</style>