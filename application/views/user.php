<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?= $title ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data User</h3>
                <div class="card-header-action float-sm-right">
                  <a href="#" data-toggle="modal" data-target="#modal-add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="table-users" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th width="30px">No</th>
                      <th>Foto</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Jenis Kelamin</th>
                      <th>No. HP</th>
                      <th>Unit</th>
                      <th>Username</th>
                      <th width="120px" class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      foreach ($users as $u): ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><img src="<?= base_url('assets/img/profile/'.$u['photos']) ?>" style="max-width: 100px;"></td>
                          <td><?= $u['name'] ?></td>
                          <td><?= $u['email'] ?></td>
                          <td><?= $u['gender'] ?></td>
                          <td><?= $u['phone'] ?></td>
                          <td><?= $u['unit'] ?></td>
                          <td><?= $u['username'] ?></td>
                          <td class="text-center">
                            <button type="button" data-toggle="modal" data-target="#modal-change-image<?= $u['id_user'] ?>" class="btn btn-success"><i class="fa fa-image"></i></button>
                            <button type="button" data-toggle="modal" data-target="#modal-edit<?= $u['id_user'] ?>" class="btn btn-info"><i class="fa fa-edit"></i></button>
                            <button type="button" data-toggle="modal" data-target="#modal-delete<?= $u['id_user'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('save-new-user') ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label for="1">Nama</label>
          <input type="text" class="form-control" id="1" name="name" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Jenis Kelamin</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="Laki-laki" name="gender">
            <label class="form-check-label">Laki-laki</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="Perempuan" name="gender">
            <label class="form-check-label">Perempuan</label>
          </div>
        </div>
        <div class="form-group">
          <label for="1">No. HP</label>
          <input type="text" class="form-control" id="1" name="phone" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Email</label>
          <input type="email" class="form-control" id="1" name="email" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Unit</label>
          <input type="text" class="form-control" id="1" name="unit" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Username</label>
          <input type="text" class="form-control" id="1" name="username" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Password</label>
          <input type="password" class="form-control" id="1" name="password" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Konfirmasi Password</label>
          <input type="password" class="form-control" id="1" name="password_confirm" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Role</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="1" name="role">
            <label class="form-check-label">Pengelola Proyek</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="0" name="role">
            <label class="form-check-label">User</label>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
</div>


<?php foreach ($users as $u): ?>
<div class="modal fade" id="modal-change-image<?= $u['id_user'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Foto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('change-user-photos/'.$u['id_user']) ?>" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Upload Foto</label>
          <input type="file" class="form-control" id="exampleInputEmail1" name="photos" required="">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<?php endforeach; ?>

<?php foreach ($users as $u): ?>
<div class="modal fade" id="modal-edit<?= $u['id_user'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('save-edit-user/'.$u['id_user']) ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label for="1">Name</label>
          <input type="text" class="form-control" id="1" name="name" value="<?= $u['name'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Jenis Kelamin</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="Laki-laki" name="gender" <?= $u['gender'] == 'Laki-laki' ? 'checked' : '' ?>>
            <label class="form-check-label">Laki-laki</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="Perempuan" name="gender" <?= $u['gender'] == 'Perempuan' ? 'checked' : '' ?>>
            <label class="form-check-label">Perempuan</label>
          </div>
        </div>
        <div class="form-group">
          <label for="1">No. HP</label>
          <input type="text" class="form-control" id="1" name="phone" value="<?= $u['phone'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Email</label>
          <input type="email" class="form-control" id="1" name="email" value="<?= $u['email'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Unit</label>
          <input type="text" class="form-control" id="1" name="unit" value="<?= $u['unit'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Username</label>
          <input type="text" class="form-control" id="1" name="username" value="<?= $u['username'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Password</label>
          <input type="password" class="form-control" id="1" name="password" value="">
        </div>
        <div class="form-group">
          <label for="1">Konfirmasi Password</label>
          <input type="password" class="form-control" id="1" name="password_confirm" value="">
        </div>
        <div class="form-group">
          <label for="1">Role</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="1" name="role" <?= $u['role'] == '1' ? 'checked' : '' ?>>
            <label class="form-check-label">Pengelola Proyek</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="0" name="role" <?= $u['role'] == '0' ? 'checked' : '' ?>>
            <label class="form-check-label">User</label>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<?php endforeach; ?>

<?php foreach ($users as $u): ?>
<div class="modal fade" id="modal-delete<?= $u['id_user'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Anda yakin ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <a href="<?= base_url('delete-user/'.$u['id_user']) ?>" class="btn btn-danger">Ya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<?php endforeach; ?>

<?php $this->load->view('layout/footer') ?>