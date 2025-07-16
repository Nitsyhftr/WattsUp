<main class="content">
  <div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
      <div class="col-auto d-none d-sm-block">
        <h3><strong><?= $title ?></strong></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php $this->load->view('layouts/flashdata'); ?>
        <div class="card">
          <div class="card-body">

            <!-- SEARCH & SORT FORM -->
            <form method="get" class="row mb-4">
              <div class="col-md-5">
                <input type="text" name="search" class="form-control" placeholder="Cari ID pelanggan atau penggunaan" value="<?= $this->input->get('search'); ?>">
              </div>
              <div class="col-md-3">
              <select name="daya" class="form-select">
                <option value="">-- Pilih Daya --</option>
                <?php foreach ($daftar_daya as $val): ?>
                  <option value="<?= $val ?>" <?= ($this->input->get('daya') === $val) ? 'selected' : '' ?>>
                    <?= $val ?>
                <?php endforeach; ?>
              </select>
            </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
              </div>
              <div class="col-md-2">
                <a href="<?= base_url('administrator/penggunaan') ?>" class="btn btn-outline-secondary w-100">Reset Filter</a>
              </div>
            </form>
            <!-- END FORM -->

            <!-- TABEL -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID Penggunaan</th>
                  <th>ID Pelanggan</th>
                  <th>Nama Pelanggan</th>
                  <th>Bulan</th>
                  <th>Tahun</th>
                  <th>Meter Awal</th>
                  <th>Meter Akhir</th>
                  <th>Daya</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($usages)): ?>
                  <?php foreach ($usages as $u): ?>
                    <tr>
                      <td><?= $u->id_penggunaan ?></td>
                      <td><?= $u->id_pelanggan ?></td>
                      <td><?= $u->nama_pelanggan ?></td>
                      <td><?= MonthToString($u->bulan) ?></td>
                      <td><?= $u->tahun ?></td>
                      <td><?= $u->meter_awal ?></td>
                      <td><?= $u->meter_akhir ?></td>
                      <td><?= $u->daya ?></td>
                      <td>
                        <div class="d-flex gap-2">
                        <?php if (empty($u->total_tagihan) || $u->total_tagihan == 0): ?>
                          <a href="<?php echo site_url('administrator/penggunaan/hapus/' . $u->id_penggunaan) ?>" class="btn btn-danger btn-sm">Hapus</a>
                        <?php else: ?>
                          <span class="btn btn-secondary btn-sm" title="Tidak bisa menghapus data karena tagihannya sudah lunas">Terkunci</span>
                        <?php endif; ?>
                      </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="9" class="text-center">Data tidak ditemukan</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</main>