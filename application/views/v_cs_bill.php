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
            <!-- ✅ Form Pencarian dan Sorting -->
            <form method="get" class="row mb-4">
              <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari ID tagihan, penggunaan atau Pelanggan..." value="<?= $this->input->get('search'); ?>">
              </div>
              <div class="col-md-4">
                <select name="status" class="form-select">
                  <option value="">-- Filter Status --</option>
                  <option value="PAID" <?= $this->input->get('status') === 'PAID' ? 'selected' : '' ?>>Lunas</option>
                  <option value="UNPAID" <?= $this->input->get('status') === 'UNPAID' ? 'selected' : '' ?>>Belum Lunas</option>
                  <option value="PROCESSED" <?= $this->input->get('status') === 'PROCESSED' ? 'selected' : '' ?>>Menunggu</option>
                </select>
              </div>
              <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-primary">Cari</button>
              </div>
              <div class="col-md-2">
                <a href="<?= base_url('administrator/tagihan') ?>" class="btn btn-outline-secondary w-100">Reset</a>
              </div>
            </form>
            <!-- ✅ END FORM -->
            <div class=" table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Detail</th>
                    <th>ID Tagihan</th>
                    <th>Periode</th>
                    <th class=" text-nowrap ">Jumlah Meter</th>
                    <th>Jumlah Bayar</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($bills)) : ?>
                  <?php foreach ($bills as $b) : ?>
                    <tr>
                      <td class="text-nowrap">
                        <div class="d-flex gap-2  ">
                          <a href="<?php echo site_url('pelanggan/tagihan/' . $b->id_tagihan) ?>" class="btn btn-primary btn-sm d-flex align-items-center gap-2  "> <i class="btn-icon-prepend" data-feather="info"></i> Detail</a>
                        </div>
                      </td>
                      <td><?= $b->id_tagihan; ?></td>
                      <td class=" text-nowrap "><?= MonthToString($b->bulan); ?> <?= $b->tahun; ?></td>
                      <td><?= $b->jumlah_meter; ?> </td>
                      <td class="text-nowrap"><?= Rupiah($b->tarif_perkwh * $b->jumlah_meter) ?></td>
                      <td>
                        <div>
                          <?php if ($b->status === "PAID") { ?>
                            <span class=" badge bg-success rounded-0 px-3 py-2   ">Lunas</span>
                          <?php } elseif ($b->status === "PROCESSED") { ?>
                            <span class=" badge bg-warning rounded-0 px-3 py-2   ">Diproses</span>
                          <?php } else { ?>
                            <span class=" badge rounded-0 bg-danger px-3 py-2">Belum Lunas</span>
                          <?php } ?>
                        </div>
                      </td>

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