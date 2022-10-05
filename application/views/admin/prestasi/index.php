  <div class="container-fluid">
      <div class="page-title">
          <div class="row">
              <div class="col-6">
                  <h3>
                      <?= $title ?>
                  </h3>
              </div>
              <div class="col-6 text-end">
                  <a href="<?= base_url('admin/prestasi/create/') ?>" class="btn btn-primary">
                      Tambah Data
                  </a>
              </div>
          </div>
      </div>
  </div>
  <div class="container-fluid">
      <?php
        if ($this->session->flashdata('success')) {
            echo $this->session->flashdata('success');
        }
        ?>
      <div class="shadow-sm">
          <div class="table table-responsive">
              <table class="table table-hovered mb-0">
                  <thead class="table-dark">
                      <tr>
                          <th>#</th>
                          <th>Judul</th>
                          <th>Tanggal</th>
                          <th>Edit</th>
                          <th>Hapus</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no = 0;
                        foreach ($prestasis as $prestasi) : $no++; ?>
                          <tr>
                              <th><?= $no; ?></th>
                              <td>
                                  <a href="<?= base_url('p/' . $prestasi['link']); ?>" class="text-dark">
                                      <?= $prestasi['title']; ?>
                                  </a>
                              </td>
                              <td>
                                  <?= $prestasi['date']; ?>
                              </td>
                              <td>
                                  <a href="<?= base_url('admin/prestasi/update/' . $prestasi['id']); ?>">
                                      <span class="badge badge-success">Edit</span>
                                  </a>
                              </td>
                              <td>
                                  <?= form_open('admin/prestasi/delete'); ?>
                                  <input type="hidden" name="id" value="<?= $prestasi['id'] ?>">
                                  <button type="submit" class="badge badge-danger border-0">Hapus</button>
                                  <?= form_close(); ?>
                              </td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
      </div>

      <?php include(APPPATH . 'views/admin/dir/copyright.php'); ?>

  </div>