<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/template_admin_assets/assets/images/favicon.png">
    <title>Xtreme Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>template_admin_assets/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/template_admin_assets/dist/css/style.min.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php $this->load->view('admin/template/header/index'); ?>
        <?php $this->load->view('admin/template/sidebar/index'); ?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">
                            <?= $this->session->userdata('admin_page'); ?>
                        </h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">

                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Tambah Kelas
                </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <form method="POST" action="<?= base_url('Admin/AddNewDataClassroom')?>">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Kelas</label>
                                    <input list="kelas" class="form-control" name="kelas" placeholder="pilih kelas" autocomplete="off"/>
                                    <datalist id="kelas" name="kelas">
                                        <option value="10">X (sepuluh)</option>
                                        <option value="11">XI (sebelas)</option>
                                        <option value="12">XII (dua belas)</option>
                                    </datalist>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Kompetensi Keahlian</label>
                                    <input type="text" class="form-control" id="kompetensi" placeholder="Masukkan kompetensi keahlian" name="kompetensi" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="check_verify">
                                    <small class="form-check-label text-danger" for="gridCheck">
                                        Cek jika data sudah benar
                                    </small>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary float-right m-1">Tambahkan</button>
                                <button class="btn btn-secondary float-right m-1" type="reset" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <table id="table_id" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Kelas</th>
                            <th>Kompetensi Keahlian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($classes as $class){ ?>
                        <tr>
                            <td><?= $class['nama_kelas']?></td>
                            <td><?= $class['kompetensi_keahlian']?></td>
                            <td>
                                <a href="<?= base_url('Admin/DeleteClasses')?>?id=<?= $class['id_kelas']?>">
                                    <i class="m-r-10 mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                        <?php }?>
                </table>
            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>assets/template_admin_assets/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>assets/template_admin_assets/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/template_admin_assets/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/template_admin_assets/dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>assets/template_admin_assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url() ?>assets/template_admin_assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url() ?>assets/template_admin_assets/dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="<?= base_url() ?>assets/template_admin_assets/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="<?= base_url() ?>template_admin_assets/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="<?= base_url() ?>template_admin_assets/dist/js/pages/dashboards/dashboard1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
</body>

</html>