<main class="content">

  <div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
      <div class="col-auto d-none d-sm-block">
        <h3><strong><?= $title ?></strong></h3>
      </div>

      <div class="col-auto ms-auto text-end mt-n1">
        <a href="<?= base_url("administrator/pelanggan/tambah") ?>" class="btn btn-primary">Tambah Pelanggan</a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php $this->load->view('layouts/flashdata'); ?>

        <div class="card">
          <div class="card-body">

            <!-- ✅ FORM FILTER & SEARCH -->
            <form method="get" class="row mb-4">
              <div class="col-md-5">
                <input type="text" name="search" class="form-control" placeholder="Cari Nama atau ID Pelanggan" value="<?= $this->input->get('search') ?>">
              </div>

              <div class="col-md-3">
                <select name="daya" class="form-select">
                  <option value="">-- Filter Daya --</option>
                  <?php foreach ($daftar_daya as $val): ?>
                    <option value="<?= $val ?>" <?= $this->input->get('daya') === $val ? 'selected' : '' ?>>
                      <?= $val ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
              </div>

              <div class="col-md-2 mt-2 mt-md-0">
                <a href="<?= base_url('administrator/pelanggan') ?>" class="btn btn-outline-secondary w-100">Reset</a>
              </div>
            </form>
            <!-- ✅ END FORM -->

            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th>ID Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>Nomor KWH</th>
                    <th>Daya</th>
                    <th>Tarif Per KWH</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($customers)) : ?>
                    <?php foreach ($customers as $c) : ?>
                      <tr>
                        <td><?= $c->id_pelanggan ?></td>
                        <td><?= $c->nama_pelanggan ?></td>
                        <td><?= $c->username ?></td>
                        <td><?= $c->alamat ?></td>
                        <td><?= $c->nomor_kwh ?></td>
                        <td><?= $c->daya ?></td>
                        <td><?= Rupiah($c->tarif_perkwh) ?></td>
                        <td>
                          <div class="d-flex gap-2">
                            <a href="<?= site_url('administrator/pelanggan/ubah/' . $c->id_pelanggan) ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?= site_url('administrator/pelanggan/hapus/' . $c->id_pelanggan) ?>" class="btn btn-danger btn-sm">Hapus</a>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else : ?>
                    <tr>
                      <td colspan="8" class="text-center">Data tidak ditemukan</td>
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
