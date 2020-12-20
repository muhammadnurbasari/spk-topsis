<div id="layoutSidenav">
    <!-- sidebar -->
    <?php echo $this->load->view('partials/sidebar')->output->final_output;?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><?= $info_topbar; ?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><?= $info_topbar; ?></li>
                </ol>
                <div class="row">
                    <!-- tabel  -->
                    <div class="col-sm-12">
                      <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            DataTable <?= $info_topbar; ?>
                            <button class="btn btn-info btn-sm float-right" id="addButton" data-table="users">Tambah users </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $no = 1; foreach ($users as $key => $value): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['username'] ?></td>
                                            <td><?= $value['role'] == "1" ? "Admin" : "Manager"; ?></td>
                                            <td>
                                              <button class="btn btn-warning btn-sm" id="editButton" data-table="users" data-id="<?php echo $value['users_id'] ?>"><i class="fas fa-edit fa-fw"></i></button>
                                              <button class="btn btn-danger btn-sm" id="deleteButton" data-id="<?php echo $value['users_id'] ?>" data-table="users" data-name="<?php echo $value['username'] ?>"><i class="fas fa-trash fa-fw"></i></button>
                                            </td>
                                        </tr>
                                      <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- footer content -->
        <?php echo $this->load->view('partials/content_footer')->output->final_output; ?>
    </div>
</div>