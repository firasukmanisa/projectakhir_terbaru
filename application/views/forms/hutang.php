<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Hutang</h1>

  <!--Cari member-->

  <form class="form-inline mr-auto w-100 navbar-search" method="post" action="<?= base_url('KontrolHutang'); ?>">
    <div class="input-group">
      <input type="text" name="username" id="username" class="form-control bg-light border-1" placeholder="Search username..." value="<?= set_value('username'); ?>" aria-label="Search" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-primary" type="submit">
          <span class="fas fa-search fa-sm"></span>
        </button>
      </div>
    </div>
  </form>
  <br>
  <?php if ($search != null && $user['username'] != $search['username']) { ?>
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="<?= base_url('assets/img/profile/') . $search['foto_profil']; ?>" class="card-img">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $search['nama']; ?></h5>
            <p class="card-text"><?= $search['username']; ?></p>
            <form action="<?= base_url('KontrolHutang/sendNotif/' . $search['username']); ?>" method="post">
              <!-- coba dulu modal buat tampilin notif gitu -->
              <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal_popup">Add <span class="fas fa-user-plus"></span></button>
              <div class="modal fade" id="modal_popup" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="row">
                      <div class="col-lg">
                        <div class="p-5">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                          </div>
                          <div class="modal-body text-center">
                            <div class="icon-circle bg-primary">
                              <i class="fas fa-user-check text-white"></i>
                            </div>
                            <h5>Request sent!</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } else {
    echo $tulisan;
  } ?>

  <br><br>
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#insert-modal"><span class="fa fa-plus" aria-hidden="true"></span> Tambah</button>
  <br><br>
  <!--KODINGAN ADD PEMASUKAN BARU-->
  <div class="modal fade" id="insert-modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="modal-body text-center">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Hutang Ah!</h1>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url('KontrolHutang/insertHutang'); ?>">
                  <div class="modal-body">
                    <div class="form-group">
                      <div class="col-xs-8">
                        <select name="teman" id="teman" class="form-control" required>
                          <option value="">-TEMANKU-</option>
                          <option value="<?= $listfriend['id_penerima']; ?>"><?= $listfriend['id_penerima']; ?></option>
                          <option value="Gaji">Gaji</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-xs-8">
                        <input name="nama_hutang" id="nama_hutang" class="form-control" type="text" placeholder="Nama Hutang" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-xs-8">
                        <input name="jumlah_hutang" id="jumlah_hutang" class="form-control" type="numeric" placeholder="Jumlah Hutang" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-xs-8">
                        <input name="tanggal_hutang" id="tanggal_hutang" class="form-control" type="date" placeholder="Tanggal" required>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-success">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--END MODAL ADD BARANG-->

  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Orang yang dihutangi</th>
              <th>Nama Hutang</th>
              <th>Jumlah Hutang</th>
              <th>Tanggal</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->