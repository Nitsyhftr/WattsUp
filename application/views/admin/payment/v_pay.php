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

            <!-- Form Filter Bulan & Tahun -->
            <form method="get" class="row mb-3">
              <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari ID, Nama, atau Petugas" value="<?= $this->input->get('search'); ?>">
              </div>
              <div class="col-md-2">
                <select name="bulan" class="form-select">
                  <option value="">-- Pilih Bulan --</option>
                  <?php foreach ($daftar_bulan as $key => $value): ?>
                    <option value="<?= $key ?>" <?= $this->input->get('bulan') == $key ? 'selected' : '' ?>><?= $value ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-2">
                <select name="tahun" class="form-select">
                  <option value="">-- Pilih Tahun --</option>
                  <?php for ($th = date('Y'); $th >= 2020; $th--): ?>
                    <option value="<?= $th ?>" <?= $this->input->get('tahun') == $th ? 'selected' : '' ?>><?= $th ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
              </div>
              <div class="col-md-2">
                <a href="<?= base_url('administrator/pembayaran') ?>" class="btn btn-outline-secondary w-100">Reset Filter</a>
              </div>
            </form>
            <!-- Tabel Data Pembayaran -->
            <div class="table-responsive mt-3">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Pelanggan</th>
                    <th>Periode</th>
                    <th>Biaya Admin</th>
                    <th>Jumlah Bayar</th>
                    <th>Tanggal Bayar</th>
                    <th>Petugas</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($pays)) : ?>
                    <?php foreach ($pays as $p) : ?>
                      <tr>
                        <td><?= $p->id_pembayaran ?></td>
                        <td>
                          <span><?= $p->id_pelanggan; ?></span>
                          <div class="text-dark text-capitalize fw-bold">(<?= $p->nama_pelanggan ?>)</div>
                        </td>
                        <td class="text-nowrap"><?= MonthToString($p->bulan) ?> <?= $p->tahun ?></td>
                        <td class="text-nowrap"><?= Rupiah($p->biaya_admin) ?></td>
                        <td class="text-nowrap"><?= Rupiah($p->total_bayar) ?></td>
                        <td><?= FormatTanggalIndo($p->tgl_bayar) ?></td>
                        <td class="text-capitalize"><?= $p->nama_admin  ?></td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else : ?>
                    <tr>
                      <td colspan="7" class="text-center text-muted">Tidak ada data ditemukan.</td>
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