<main class="content">
  <div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
      <div class="col-auto d-none d-sm-block">
        <h3><strong><?= $title ?></strong></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-12 py-2">
        <?php $this->load->view('layouts/flashdata'); ?>
      </div>

      <!-- Form Tambah Tarif -->
      <div class="col-12 col-md-5 col-lg-4">
        <div class="card card-body shadow-none border">
          <form action="<?= base_url("administrator/tarif/create") ?>" method="post">
            <div class="form-group mb-3">
              <label for="daya" class="form-label">Daya</label>
              <input type="text" class="form-control" id="daya" name="daya" placeholder="Daya">
              <?= form_error('daya', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group mb-3">
              <label for="tarif_perkwh" class="form-label">Tarif per-KWH</label>
              <input type="text" class="form-control" id="tarif_perkwh" name="tarif_perkwh" placeholder="Tarif perkwh">
              <?= form_error('tarif_perkwh', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group d-flex">
              <button type="submit" class="btn btn-primary w-100 mb-3">Tambah</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Tabel Data Tarif -->
      <div class="col-md-7 col-lg-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            
            <!-- Form Search & Sort -->
            <form method="get" class="row mb-3">
              <div class="col-md-5">
                <input type="text" name="search" class="form-control" placeholder="Cari daya atau tarif..." value="<?= $this->input->get('search'); ?>">
              </div>
              <div class="col-md-3">
                <select name="sort" class="form-select">
                  <option value="" disabled <?= !$this->input->get('sort') ? 'selected' : '' ?>>-- Urutkan berdasarkan --</option>
                  <option value="daya" <?= $this->input->get('sort') === 'daya' ? 'selected' : '' ?>>Daya</option>
                  <option value="tarif_perkwh" <?= $this->input->get('sort') === 'tarif_perkwh' ? 'selected' : '' ?>>Tarif</option>
                </select>
              </div>
              <div class="col-md-2">
                <select name="direction" class="form-select">
                  <option value="" disabled <?= !$this->input->get('direction') ? 'selected' : '' ?>>-- Pilih Arah --</option>
                  <option value="asc" <?= $this->input->get('direction') === 'asc' ? 'selected' : '' ?>>Naik (ASC)</option>
                  <option value="desc" <?= $this->input->get('direction') === 'desc' ? 'selected' : '' ?>>Turun (DESC)</option>
                </select>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
              </div>
              <div class="col-md-12 mt-2">
                <a href="<?= base_url('administrator/tarif') ?>" class="btn btn-outline-secondary w-100">Reset Filter</a>
              </div>
            </form>

            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>
                      <a href="<?= base_url('administrator/tarif?sort=daya&direction=' . ($this->input->get('direction') === 'asc' ? 'desc' : 'asc')); ?>">
                        Daya
                      </a>
                    </th>
                    <th>
                      <a href="<?= base_url('administrator/tarif?sort=tarif_perkwh&direction=' . ($this->input->get('direction') === 'asc' ? 'desc' : 'asc')); ?>">
                        Tarif/KWh
                      </a>
                    </th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($tariffs as $tr) : ?>
                    <tr>
                      <td><?= $tr['id_tarif'] ?></td>
                      <td><?= $tr['daya']; ?></td>
                      <td><?= Rupiah ($tr['tarif_perkwh']); ?></td>
                      <td>
                        <div class="d-flex gap-2">
                          <a class="btn btn-sm btn-primary" href="<?= base_url('administrator/tarif/update/') . $tr['id_tarif']; ?>">Edit</a>
                          <a class="btn btn-sm btn-danger" href="<?= base_url('administrator/tarif/delete/') . $tr['id_tarif']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  <?php if (empty($tariffs)) : ?>
                    <tr>
                      <td colspan="4" class="text-center text-muted">Tidak ada data ditemukan.</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</main>
