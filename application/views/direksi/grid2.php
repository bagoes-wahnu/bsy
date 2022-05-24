<body>
    <link href="<?php echo base_url();?>assets/draggable/sticky.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/draggable/style.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/draggable/jscustom.js"></script>
    <script src="<?php echo base_url();?>assets/draggable/jscustom2.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            coba();
            coba2();

            /*
            var string = '<?php echo base_url();?>assets/img/pegawai/john_doe.jpg';
            $(".box").css("backgroundImage", "url('" + string + "')");
            */

            $(".box").prepend("<div class='lemek'></div>");

            /* Gambar */
                var string = '<?php echo base_url();?>assets/img/pegawai/john_doe.jpg';
                $(".lemek").css("backgroundImage", "url('" + string + "')");
            /* Gambar */

            /* Text */
                $(".box").prepend("<div class='middle'></div>");
                $(".middle").prepend("<div class='bagian'>Pemegang Saham</div>");
                $(".middle").prepend("<div class='nama'>Abdi Sembada Amirullah</div>");
            /* Text */
        });
    </script>

    <img src="">
    
    <section id="content_outer_wrapper" class="">
        <div class="rightnav_v2">
            <div id="header_wrapper" class="header-sm">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <header id="header">
                                <h1>Informasi Data Wilayah</h1>
                                <p>Berikut ini adalah beberapa informasi data wilayah terkait aplikasi.</p>
                                <ol class="breadcrumb">
                                    <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                    <li><a href="javascript:void(0)">Master</a></li>
                                    <li class="active">Master Wilayah</li>
                                </ol>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabpanel tab-header">
                <ul class="nav nav-tabs p-l-20">
                    <li class="active" role="presentation"><a href="#dashboard1" data-toggle="tab">Dewan Komisaris</a></li>
                    <li role="presentation"><a href="#dashboard2" data-toggle="tab">Direksi</a></li>
                </ul>
            </div>
            <div id="content" class="container-fluid" style="padding-top: 15px;">
                <div class="content-body">
                    <div id="dashboard_content" class="tab-content">
                        <div class="tab-pane fade active in" id="dashboard1">
                            <section id="boxGrid">
                                <ul id="boxLayout" class="boxLayout" class="canvas"></ul>
                            </section>
                        </div>

                        <div class="tab-pane fade" id="dashboard2">
                            <section id="boxGrid">
                                <ul id="boxLayout2" class="boxLayout2" class="canvas"></ul>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>                   
</body>

<style type="text/css">
    #header_wrapper.header-sm{height: 115px;}

    #header_wrapper.header-sm #header h1{padding: 0px;}

    #header_wrapper.header-sm #header .breadcrumb {padding: 8px 15px 8px 0px;}

    .rightnav_v2{
        padding-top: 46px;
        min-height: 100%; 
    }

    body #app_wrapper .rightnav_v2 #header_wrapper {background-color: #34495e;}

    #header_wrapper.header-md{height: 140px;}
</style>