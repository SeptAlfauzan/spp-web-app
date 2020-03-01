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
                    Tambah Petugas
                </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <form method="post" action="<?= base_url('Admin/insertEmployee') ?>">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nama Petugas</label>
                                    <input type="text" class="form-control" name="name" id="inputEmail4" placeholder="Email" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Level</label>
                                    <input list="level" class="form-control" id="inputPassword4" placeholder="Pilih level akun" name="level" autocomplete="off" />
                                    <datalist id="level" name="level">
                                        <?php for ($i = 0; $i < count($level); $i++) { ?>
                                            <option value="<?= $level[$i] ?>"></option>
                                        <?php } ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group col-md-6 p-0">
                                <label for="inputAddress">Username</label>
                                <input type="text" class="form-control" id="pass" name="username" placeholder="Ketik username anda" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6 p-0">
                                <label for="inputAddress">Password</label>
                                <input type="text" class="form-control" id="pass" name="password" placeholder="Ketik passwod anda" autocomplete="off">
                                <input type="text" class="form-control mt-3" name="retype_password" placeholder="Ketik ulang password anda" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="check_verify">
                                    <small class="form-check-label text-danger" for="gridCheck">
                                        Cek jika data sudah sesuai
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
                            <th class="text-secondary">Nama</th>
                            <th class="text-secondary">Username</th>
                            <th class="text-secondary">Level</th>
                            <th class="text-secondary">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <small class="text-info mb-5 pb-5">*klik data akun untuk edit</small>
                        <?php foreach ($employees as $employee) { ?>
                            <tr style="border: none" id="row<?= $employee['id_petugas'] ?>">
                                <form action="" id="<?= $employee['id_petugas'] ?>">
                                    <td>
                                        <input type="text" oninput="editAccount(this)" class="input-seamless col-12" value="<?= $employee['nama_petugas'] ?>">
                                    </td>
                                    <td>
                                        <input type="text" oninput="editAccount(this)" class="input-seamless col-12" value="<?= $employee['username'] ?>">
                                    </td>
                                    <td>
                                        <select onchange="editAccount(this)" class="form-control" id="exampleFormControlSelect1">
                                            <option><?= $employee['level']?></option>
                                            <?php for ($i=0; $i < count($level); $i++) { ?>
                                                <?php if($level[$i] != $employee['level']){?>
                                                <option><?= $level[$i]?></option>
                                                <?php }?>
                                            <?php }?>
                                        </select>
                                        <!-- <input type="text" xxx class="input-seamless col-12" value="<?= $employee['level'] ?>"> -->
                                    </td>
                                    <td>
                                        <a href="<?= base_url('Admin/deleteEmployee') ?>?id=<?= $employee['id_petugas'] ?>">
                                            <i style="font-size: 20px" class="m-r-10 mdi mdi-delete text-danger"></i>
                                        </a>
                                        <button class="btn btn-danger d-none" type="reset" id="resetbtnrow<?= $employee['id_petugas'] ?>" >batal</button>
                                        <button type="submit" class="btn btn-info d-none" id="btnrow<?= $employee['id_petugas'] ?>">
                                            simpan
                                        </button>
                                    </td>
                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
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
    <script>
        function editAccount(e) {
            let td = e.parentNode;
            let form = td.parentNode.getAttribute('id');
            let btn = document.getElementById('btn' + form);
            let btnReset = document.getElementById('resetbtn' + form);
            btn.classList.remove('d-none');
            console.log('berhasil');
        }
    </script>
</body>

</html>