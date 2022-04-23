<div class="modal fade" id="modal-add-activity">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kegiatan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('save-new-activity/'.$p['id_project']) ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label for="1">Nama Kegiatan</label>
          <input type="text" class="form-control" id="1" name="name_activity" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Jenis Kegiatan</label>
          <input type="text" class="form-control" id="1" name="categories_activity" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Deskripsi</label>
          <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="form-group">
          <label for="1">Bobot (%)</label>
          <input type="number" class="form-control" id="1" name="bobot" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Rencana Anggaran</label>
          <input type="number" class="form-control" id="1" name="budget_planning" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Tanggal Mulai</label>
          <input type="date" class="form-control" id="1" name="date_start" value="" required="">
        </div>
        <div class="form-group">
          <label for="1">Tanggal Perencaan Selesai</label>
          <input type="date" class="form-control" id="1" name="date_plan_end" value="" required="">
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

<?php foreach ($planning_activities as $u): ?>
<div class="modal fade" id="modal-edit-activity<?= $u['id_activity'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Kegiatan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('save-edit-activity/'.$p['id_project'].'/'.$u['id_activity']) ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label for="1">Nama Kegiatan</label>
          <input type="text" class="form-control" id="1" name="name_activity" value="<?= $u['name_activity'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Jenis Kegiatan</label>
          <input type="text" class="form-control" id="1" name="categories_activity" value="<?= $u['categories_activity'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Deskripsi</label>
          <textarea class="form-control" name="description"><?= $u['description'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="1">Bobot (%)</label>
          <input type="number" class="form-control" id="1" name="bobot" value="<?= $u['bobot'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Rencana Anggaran</label>
          <input type="number" class="form-control" id="1" name="budget_planning" value="<?= $u['budget_planning'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Tanggal Mulai</label>
          <input type="date" class="form-control" id="1" name="date_start" value="<?= $u['date_start'] ?>" required="">
        </div>
        <div class="form-group">
          <label for="1">Tanggal Perencaan Selesai</label>
          <input type="date" class="form-control" id="1" name="date_plan_end" value="<?= $u['date_plan_end'] ?>" required="">
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

<?php foreach ($planning_activities as $u): ?>
<div class="modal fade" id="modal-delete-activity<?= $u['id_activity'] ?>">
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
        <a href="<?= base_url('delete-activity/'.$p['id_project'].'/'.$u['id_activity']) ?>" class="btn btn-danger">Ya</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?php foreach ($planning_activities as $u): ?>
<div class="modal fade" id="modal-update-status-activity<?= $u['id_activity'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Status Kegiatan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('update-status-activity/'.$p['id_project'].'/'.$u['id_activity']) ?>" method="POST">
      <div class="modal-body">
        <input type="hidden" name="status_before" value="<?= $u['status_activity'] ?>">
        <div class="form-group">
          <label for="1">Status</label>
          <select name="status_activity" class="form-control">
            <option disabled="" selected="">-- Pilih Status --</option>
            <option value="Open" <?= $u['status_activity'] == 'Open' ? 'selected' : '' ?>>Open</option>
            <option value="Progress" <?= $u['status_activity'] == 'Progress' ? 'selected' : '' ?>>Progress</option>
            <option value="Finish" <?= $u['status_activity'] == 'Finish' ? 'selected' : '' ?>>Finish</option>
          </select>
        </div>
        <div class="form-group">
          <label for="1">Tanggal Selesai</label>
          <input type="date" class="form-control" id="1" name="date_end" value="<?= $u['date_end'] ?>" >
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

<div class="modal fade" id="modal-add-attachment">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Lampiran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('save-new-attachment/'.$p['id_project']) ?>" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
          <label for="1">File</label>
          <input type="file" class="form-control" id="1" name="file" value="" >
        </div>
        <div class="form-group">
          <label for="1">Deskripsi</label>
          <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="form-group">
          <label for="1">Nama Kegiatan</label>
          <input type="text" class="form-control" id="1" name="name_activity" value="" >
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

<?php foreach ($attachment as $u): ?>
<div class="modal fade" id="modal-delete-attachment<?= $u['id_attachment'] ?>">
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
        <a href="<?= base_url('delete-attachment/'.$p['id_project'].'/'.$u['id_attachment']) ?>" class="btn btn-danger">Ya</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>