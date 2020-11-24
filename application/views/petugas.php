<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Petugas <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"data-target="#modal_add"><span class="fas fa-plus"></span></button></h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">No KTP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach($petugas as $row):
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['no_ktp']; ?></td>
                    <td><?php echo $row['nama_petugas']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td>
                      <!--<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_see<?php echo $row['id_petugas'];?>"><span class="far fa-eye"></span></button>-->
                      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_edit<?php echo $row['id_petugas'];?>"><span class="far fa-edit"></span></button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $row['id_petugas'];?>"><span class="fas fa-trash"></span></button>
                    </td>
                  </tr>
                  <?php
                    $no++;
                    endforeach;
                  ?>
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
<!--MODAL TAMBAH CALON-->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
            <div class="modal-dialog modal-lg modal-frame modal-top modal-notify" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 align="left" class="modal-title" id="myModalLabel">Tambah Petugas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'petugas/add'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>No KTP</label>
                                <input type="hidden" name="id" value="<?php echo $kode;?>">
                                <input type="text" class="form-control" placeholder="No KTP" name="ktp">
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Nama Petugas</label>
                                <input type="text" class="form-control" placeholder="Nama Nasabah" name="nama">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="email" class="form-control" placeholder="Usrname/E-mail" name="email">
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="pass">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="number" class="form-control" placeholder="No HP" name="hp">
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tgl">
                            </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
            </div>
            </div>
        </div>

<!--END-->
<?php 
  foreach($petugas as $i):
    $id=$i['id_petugas'];
    $ktp=$i['no_ktp'];
    $nama=$i['nama_petugas'];
    $user=$i['username'];
    $tgl=$i['tgl_lahir'];
    $hp=$i['no_hp'];
    $alamat=$i['alamat'];
?>

<!--MODAL EDIT CALON-->
<div class="modal fade" id="modal_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
            <div class="modal-dialog modal-lg modal-frame modal-top modal-notify" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 align="left" class="modal-title" id="myModalLabel">Edit Petugas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'petugas/edit'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>No KTP</label>
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <input type="text" class="form-control" placeholder="No KTP" name="ktp" value="<?php echo $ktp;?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Nama Petugas</label>
                                <input type="text" class="form-control" placeholder="Nama Nasabah" name="nama" value="<?php echo $nama;?>">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="email" class="form-control" placeholder="Username/E-mail" name="email" value="<?php echo $user;?>">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="number" class="form-control" placeholder="No HP" name="hp" value="<?php echo $hp;?>">
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tgl" value="<?php echo $tgl;?>">
                            </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control"><?php echo $alamat;?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button type="submit" class="btn btn-warning">Edit</button>
                </div>
            </form>
            </div>
            </div>
        </div>

<!--END-->
<!--MODAL HAPUS CALON-->
<div class="modal fade" id="modal_hapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
            <div class="modal-dialog modal-frame modal-top modal-notify" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 align="left" class="modal-title" id="myModalLabel">Hapus Petugas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'petugas/hapus'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <p>Apakah anda yakin ingin menghapus petugas <b><?php echo $nama;?></b>?</p>
                        <input type="hidden" value="<?php echo $id;?>" name="id">
                      </div>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
<!--END-->
<?php endforeach; ?>