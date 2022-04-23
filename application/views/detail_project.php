<?php $this->load->view('layout/header') ?>
<?php $this->load->view('layout/sidebar') ?>
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Detail <?= $title ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('project') ?>">Proyek</a></li>
            <li class="breadcrumb-item active"><?= $p['name_project'] ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2><i class="fas fa-cubes"></i> <?= $p['name_project'] ?></h2>
              <h6><?= $p['unit'] ?></h6>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-home"></i> Overview</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="perencanaan-tab" data-toggle="tab" href="#perencanaan" role="tab" aria-controls="perencanaan" aria-selected="false"><i class="fas fa-user"></i> Perencanaan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="realisasi-tab" data-toggle="tab" href="#realisasi" role="tab" aria-controls="realisasi" aria-selected="false"><i class="fas fa-address-card"></i> Realisasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="lampiran-tab" data-toggle="tab" href="#lampiran" role="tab" aria-controls="lampiran" aria-selected="false"><i class="fas fa-address-card"></i> Lampiran</a>
                </li>
                
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                  <div class="row mt-4">
                    <div class="col-12">
                      <div class="progress">
                        <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                             aria-valuenow="<?= $p['progress'] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $p['progress'] ?>%">
                          <?= $p['progress'] ?>%
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-4">
                      <p>Deskripsi</p>
                    </div>
                    <div class="col-md-8">
                      <p>: <?= $p['description'] ?></p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-3">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title">Circle Proggress Bar</h4>
                        </div>
                        <div class="card-body">
                          <div class="ml-4">
                            <div class="progress-ring blue"> 
                              <span class="progress-ring-left"> 
                                <span class="progress-ring-bar"></span> 
                              </span> 
                              <span class="progress-ring-right"> 
                                <span class="progress-ring-bar"></span> 
                              </span>
                              <div class="progress-ring-value"><?= $p['progress'] ?>%</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title">Log Activity</h4>
                        </div>
                        <div class="card-body">
                          <ul class="products-list product-list-in-card pl-2 pr-2">
                            <?php foreach ($log_activities as $a) { ?>
                              <li class="item">
                                <div class="product-img">
                                  <img src="<?= base_url('assets/img/profile/'.$a['photos']) ?>" alt="Product Image" class="img-size-50">
                                </div>
                                <div class="product-info">
                                  <a href="javascript:void(0)" class="product-title"><?= $a['name'] ?></a>
                                  <?php if($a['mode'] == 'new'){ ?>
                                    <span class="badge badge-success float-right"><?= $a['mode'] ?></span><br>
                                  <?php } elseif ($a['mode'] == 'update') { ?>
                                    <span class="badge badge-primary float-right"><?= $a['mode'] ?></span><br>
                                  <?php } else { ?>
                                    <span class="badge badge-danger float-right"><?= $a['mode'] ?></span><br>
                                  <?php } ?>
                                  
                                  <span class="float-right"><?= $a['created_at'] ?></span>
                                  <span class="product-description">
                                    <?= $a['description'] ?>
                                  </span>
                                </div>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="perencanaan" role="tabpanel" aria-labelledby="perencanaan-tab">
                  <div class="row mt-4">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Data Perencanaan Kegiatan Proyek</h3>
                          <?php if(is_pengelola()): ?>
                          <div class="card-header-action float-sm-right">
                            <a href="#" data-toggle="modal" data-target="#modal-add-activity" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                          </div>
                          <?php endif; ?>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="table-responsive">
                            <table id="table-planning" class="table table-bordered table-hover">
                              <thead>
                              <tr>
                                <th width="30px">No</th>
                                <th>Nama Kegiatan</th>
                                <th>Jenis Kegiatan</th>
                                <th>Deskripsi</th>
                                <th>Bobot (%)</th>
                                <th>Rencana Anggaran</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Rencana Selesai</th>
                                <th width="120px" class="text-center">Aksi</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $no = 1;
                                foreach ($planning_activities as $u): ?>
                                  <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $u['name_activity'] ?></td>
                                    <td><?= $u['categories_activity'] ?></td>
                                    <td><?= $u['description'] ?></td>
                                    <td><?= $u['bobot'] ?></td>
                                    <td>Rp <?= number_format($u['budget_planning'], 0, ',', '.') ?></td>
                                    <td><?= $u['date_start'] ?></td>
                                    <td><?= $u['date_plan_end'] ?></td>
                                    <td class="text-center">
                                      <?php if(is_pengelola()): ?>
                                      <button type="button" data-toggle="modal" data-target="#modal-edit-activity<?= $u['id_activity'] ?>" class="btn btn-info"><i class="fa fa-edit"></i></button>
                                      <button type="button" data-toggle="modal" data-target="#modal-delete-activity<?= $u['id_activity'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
                <div class="tab-pane fade" id="realisasi" role="tabpanel" aria-labelledby="realisasi-tab">
                  <div class="row mt-4">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Data Realisasi Kegiatan Proyek</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="table-responsive">
                            <table id="table-realization" class="table table-bordered table-hover">
                              <thead>
                              <tr>
                                <th width="30px">No</th>
                                <th>Nama Kegiatan</th>
                                <th>Jenis Kegiatan</th>
                                <th>Deskripsi</th>
                                <th>Bobot (%)</th>
                                <th>Rencana Anggaran</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Rencana Selesai</th>
                                <th>Status</th>
                                <th>Tanggal Selesai</th>
                                <th width="120px" class="text-center">Aksi</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $no = 1;
                                foreach ($realization_activities as $u): ?>
                                  <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $u['name_activity'] ?></td>
                                    <td><?= $u['categories_activity'] ?></td>
                                    <td><?= $u['description'] ?></td>
                                    <td><?= $u['bobot'] ?></td>
                                    <td>Rp <?= number_format($u['budget_planning'], 0, ',', '.') ?></td>
                                    <td><?= $u['date_start'] ?></td>
                                    <td><?= $u['date_plan_end'] ?></td>
                                    <td><?= $u['status_activity'] ?></td>
                                    <td><?= $u['date_end'] ?></td>
                                    <td class="text-center">
                                      <?php if(is_pengelola()): ?>
                                      <button type="button" data-toggle="modal" data-target="#modal-update-status-activity<?= $u['id_activity'] ?>" class="btn btn-info"><i class="fa fa-edit"></i></button>
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
                <div class="tab-pane fade" id="lampiran" role="tabpanel" aria-labelledby="lampiran-tab">
                  <div class="row mt-4">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Data Lampiran Kegiatan Proyek</h3>
                          <?php if(is_pengelola()): ?>
                          <div class="card-header-action float-sm-right">
                            <a href="#" data-toggle="modal" data-target="#modal-add-attachment" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                          </div>
                          <?php endif; ?>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="table-responsive">
                            <table id="table-attach" class="table table-bordered table-hover">
                              <thead>
                              <tr>
                                <th width="30px">No</th>
                                <th>Nama Lampiran</th>
                                <th>Deskripsi</th>
                                <th>Nama Kegiatan</th>
                                <th>Created At</th>
                                <th width="120px" class="text-center">Aksi</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $no = 1;
                                foreach ($attachment as $u): ?>
                                  <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $u['file'] ?></td>
                                    <td><?= $u['description'] ?></td>
                                    <td><?= $u['name_activity'] ?></td>
                                    <td><?= $u['created_at'] ?></td>
                                    <td class="text-center">
                                      <a href="<?= base_url('assets/upload/attachment/'.$u['file']) ?>" target="_blank" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                      <?php if(is_pengelola()): ?>
                                      <button type="button" data-toggle="modal" data-target="#modal-delete-attachment<?= $u['id_attachment'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php $this->load->view('modal_detail_project') ?>
<?php $this->load->view('layout/footer') ?>