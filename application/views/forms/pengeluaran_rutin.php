        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Daftar Pengeluaran Rutin</h1>
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
                          <h1 class="h4 text-gray-900 mb-4">Pengeluaran Rutin</h1>
                        </div>
                        <form class="form-horizontal" method="post" action="<?php echo base_url('KontrolPengeluaran/insertPengeluaranRutin'); ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <div class="col-xs-8">
                                <input name="kategori" id="kategori" class="form-control" type="text" placeholder="Kategori" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-xs-8">
                                <input name="nama_pengeluaran" id="nama_pengeluaran" class="form-control" type="text" placeholder="Nama Pengeluaran" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-xs-8">
                                <input name="total" id="total" class="form-control" type="numeric" placeholder="Jumlah Pengeluaran" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-xs-8">
                                <input name="tanggal" id="tanggal" class="form-control" type="date" placeholder="Tanggal" required>
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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Pengeluaran</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Tanggal</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                            <?php foreach($list->result() as $row): ?>                    
                        <tr>   
                          <td><?php echo $row->nama_pengeluaran; ?></td>
                          <td><?php echo $row->kategori; ?></td>
                          <td><?php echo $row->jumlah_pengeluaran; ?></td>  
                          <td><?php echo $row->tanggal_pengeluaran; ?></td>
                          <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-modal"><span class="fa fa-pencil-square" aria-hidden="true"></span></button>
                            <div class="modal fade" id="edit-modal" role="dialog">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="row">
                                    <div class="col-lg">
                                      <div class="p-5">
                                        <div class="modal-body text-center">
                                          <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Pengeluaran Rutin</h1>
                                          </div>
                                          <form class="form-horizontal" method="post" action="<?php echo base_url();?>KontrolPengeluaran/updaterutin/<?php echo $row->id_pengeluaranrutin;?>">
                                            <div class="modal-body">
                                              <div class="form-group">
                                                <div class="col-xs-8">
                                                  <input name="kategori" id="kategori" class="form-control" type="text" placeholder="Kategori" value="<?php echo $row->kategori;?>" required >
                                                </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                <div class="col-xs-8">
                                                  <input name="nama_pengeluaran" id="nama_pengeluaran" class="form-control" type="text" placeholder="Nama Pengeluaran" value="<?php echo $row->nama_pengeluaran;?>" required>
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <div class="col-xs-8">
                                                  <input name="total" id="total" class="form-control" type="numeric" placeholder="Jumlah Pemasukan" value="<?php echo $row->jumlah_pengeluaran;?>" required>
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <div class="col-xs-8">
                                                  <input name="tanggal" id="tanggal" class="form-control" type="date" placeholder="Tanggal" value="<?php echo $row->tanggal_pengeluaran;?>" required>
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
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal"><span class="fa fa-trash" aria-hidden="true"></span></button>
                            <div class="modal fade" id="delete-modal" role="dialog">
                            <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="signin">
                                    <div class="modal-body text-center">
                                        <p> Are you sure you want to remove this data from the system? </p><br>
                                        <a href="<?= base_url();?>KontrolPengeluaran/deleterutin/<?php echo $row->id_pengeluaranrutin;?>"><button type="button" class="btn btn-success">Yes</button></a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                            </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- <script>
          $(document).ready(function() {
            $('#dataTable').DataTable();
          });
        </script> -->