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
                <h3 class="card-title">Data Proyek</h3>
                <?php if(is_pengelola()): ?>
                <div class="card-header-action float-sm-right">
                  <a href="#" data-toggle="modal" data-target="#modal-add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
                <?php endif; ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="table-projects" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th width="30px">No</th>
                      <th>Status</th>
                      <th>Proyek</th>
                      <th>Unit</th>
                      <th>Progress</th>
                      <th width="170px" class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      foreach ($projects as $u): ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td>
                            <?php if ($u['status_project'] == 'Progress') { ?>
                              <span class="badge badge-primary"><?= $u['status_project'] ?></span>
                            <?php } elseif ($u['status_project'] == 'Selesai') { ?>
                              <span class="badge badge-success"><?= $u['status_project'] ?></span>
                            <?php } else { ?>
                              <span class="badge badge-danger"><?= $u['status_project'] ?></span>
                            <?php } ?>
                            
                          </td>
                          <td>
                            <?= $u['name_project'] ?><br>
                            <p style="font-size: 10pt">Created at: <?= $u['created_at'] ?></p>
                          </td>
                          <td><?= $u['unit'] ?></td>
                          <td>
                            <div class="progress progress-xxs">
                              <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                                   aria-valuenow="<?= $u['progress'] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $u['progress'] ?>%">
                                <span class="sr-only"><?= $u['progress'] ?>% Complete (warning)</span>
                              </div>
                            </div>
                            <p style="font-size: 10pt">Completion with: <?= $u['progress'] ?> %</p>
                          </td>
                          <td class="text-center">
                            <a href="<?= base_url('print-project/'.$u['id_project']) ?>" class="btn btn-light"><i class="fa fa-print"></i></a>
                            <a href="<?= base_url('detail-project/'.$u['id_project']) ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            <?php if(is_pengelola()): ?>
                            <button type="button" data-toggle="modal" data-target="#modal-edit<?= $u['id_project'] ?>" class="btn btn-info"><i class="fa fa-edit"></i></button>
                            <button type="button" data-toggle="modal" data-target="#modal-delete<?= $u['id_project'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            <?php endif; ?>
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
        <h4 class="modal-title">Tambah Proyek</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('save-new-project') ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label for="1">Nama Proyek</label>
          <input type="text" class="form-control" id="1" name="name_project" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Unit</label>
          <input type="text" class="form-control" id="1" name="unit" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Client</label>
          <input type="text" class="form-control" id="1" name="client" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Nilai Proyek</label>
          <input type="text" class="form-control" id="1" name="nilai_project" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Status</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="Progress" name="status_project">
            <label class="form-check-label">Progress</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="Selesai" name="status_project">
            <label class="form-check-label">Selesai</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="Gagal" name="status_project">
            <label class="form-check-label">Gagal</label>
          </div>
        </div>
        <div class="form-group">
          <label for="1">Deskripsi</label>
          <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="form-group">
          <label for="1">Tanggal Mulai</label>
          <input type="date" class="form-control" id="1" name="date_start" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Tanggal Perencaan Selesai</label>
          <input type="date" class="form-control" id="1" name="date_end" value="" required="">
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

<?php foreach ($projects as $u): ?>
<div class="modal fade" id="modal-edit<?= $u['id_project'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Proyek</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('save-edit-project/'.$u['id_project']) ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label for="1">Nama Proyek</label>
          <input type="text" class="form-control" id="1" name="name_project" value="<?= $u['name_project'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Unit</label>
          <input type="text" class="form-control" id="1" name="unit" value="<?= $u['unit'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Client</label>
          <input type="text" class="form-control" id="1" name="client" value="<?= $u['client'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Nilai Proyek</label>
          <input type="text" class="form-control" id="1" name="nilai_project" value="<?= $u['nilai_project'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Status</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="Progress" name="status_project" <?= $u['status_project'] == 'Progress' ? 'checked' : '' ?>>
            <label class="form-check-label">Progress</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="Selesai" name="status_project" <?= $u['status_project'] == 'Selesai' ? 'checked' : '' ?>>
            <label class="form-check-label">Selesai</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" value="Gagal" name="status_project" <?= $u['status_project'] == 'Gagal' ? 'checked' : '' ?>>
            <label class="form-check-label">Gagal</label>
          </div>
        </div>
        <div class="form-group">
          <label for="1">Deskripsi</label>
          <textarea class="form-control" name="description"><?= $u['description'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="1">Tanggal Mulai</label>
          <input type="date" class="form-control" id="1" name="date_start" value="<?= $u['date_start'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Tanggal Perencaan Selesai</label>
          <input type="date" class="form-control" id="1" name="date_end" value="<?= $u['date_end'] ?>" required="">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?php foreach ($projects as $u): ?>
<div class="modal fade" id="modal-delete<?= $u['id_project'] ?>">
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
        <a href="<?= base_url('delete-project/'.$u['id_project']) ?>" class="btn btn-danger">Ya</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?php $this->load->view('layout/footer') ?>