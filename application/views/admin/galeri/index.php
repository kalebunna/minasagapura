  <div class="container-fluid">
      <div class="page-title">
          <div class="row">
              <div class="col-6">
                  <h3>
                      <?= $title ?>
                  </h3>
              </div>
              <div class="col-6 text-end">
                  <a href="<?= base_url('admin/galeri/create/') ?>" class="btn btn-primary">
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
      <div class="card">
          <div class="card-body">
              <div class="table table-responsive">
                  <table class="table table-hovered mb-0">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Judul</th>
                              <th>Tampilkan</th>
                              <th>Tanggal</th>
                              <th>Edit</th>
                              <th>Hapus</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no = 0;
                            foreach ($galeris as $galeri) : $no++; ?>
                              <tr>
                                  <th><?= $no; ?></th>
                                  <td>
                                      <a href="<?= base_url('p/' . $galeri['link']); ?>" class="text-dark">
                                          <?= $galeri['title']; ?>
                                      </a>
                                  </td>
                                  <td>
                                      <?php
                                        if ($galeri['tampilkan'] == 0) echo "Tidak";
                                        else echo "Ya";
                                        ?>
                                  </td>
                                  <td>
                                      <?= $galeri['date']; ?>
                                  </td>
                                  <td>
                                      <a href="<?= base_url('admin/galeri/update/' . $galeri['id']); ?>">
                                          <span class="badge badge-success">Edit</span>
                                      </a>
                                  </td>
                                  <td>
                                      <?= form_open('admin/galeri/delete'); ?>
                                      <input type="hidden" name="id" value="<?= $galeri['id'] ?>">
                                      <button type="submit" class="badge badge-danger border-0">Hapus</button>
                                      <?= form_close(); ?>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>