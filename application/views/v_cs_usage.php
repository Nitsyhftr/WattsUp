<main class="content">

  <div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
      <div class="col-auto d-none d-sm-block">
        <h3><strong><?= $title ?></strong></h3>
      </div>

      <div class="col-auto ms-auto text-end mt-n1">
        <!-- <a href="#" class="btn btn-light bg-white me-2">Invite a Friend</a> -->
        <a href="<?= base_url("pelanggan/penggunaan/input") ?>" class="btn btn-primary"> Input Penggunaan</a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php $this->load->view('layouts/flashdata'); ?>
        <div class="card">
          <div class="card-body">
            <!-- SEARCH & SORT FORM -->
            <form method="get" class="row mb-4">
              <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari ID penggunaan" value="<?= $this->input->get('search'); ?>">
              </div>
              <div class="col-md-2">
                <select name="bulan" class="form-select">
                  <option value="">-- Pilih Bulan --</option>
                  <?php foreach (range(1, 12) as $b): ?>
                    <option value="<?= $b ?>" <?= $this->input->get('bulan') == $b ? 'selected' : '' ?>>
                      <?= MonthToString($b) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-md-2">
                <select name="tahun" class="form-select">
                  <option value="">-- Pilih Tahun --</option>
                  <?php
                    $tahun_sekarang = date('Y');
                    for ($t = $tahun_sekarang; $t >= $tahun_sekarang - 10; $t--): ?>
                      <option value="<?= $t ?>" <?= $this->input->get('tahun') == $t ? 'selected' : '' ?>>
                        <?= $t ?>
                      </option>
                  <?php endfor; ?>
                </select>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
              </div>
              <div class="col-md-2">
                <a href="<?= base_url('pelanggan/penggunaan') ?>" class="btn btn-outline-secondary w-100">Reset Filter</a>
              </div>
            </form>
            <!-- END FORM -->

            <!-- TABEL -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID Penggunaan</th>
                  <th>Bulan</th>
                  <th>Tahun</th>
                  <th>Meter Awal</th>
                  <th>Meter Akhir</th>
                  <th>Daya</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($usages)) : ?>
                  <?php foreach ($usages as $u) : ?>
                    <tr>
                      <td><?php echo $u->id_penggunaan ?></td>
                      <td><?php echo MonthToString($u->bulan) ?></td>
                      <td><?php echo $u->tahun ?></td>
                      <td><?php echo $u->meter_awal ?></td>
                      <td><?php echo $u->meter_akhir ?></td>
                      <td><?php echo $u->daya ?></td>
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
</main>