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
              <h3 class="mb-0">Calon Nasabah <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"data-target="#modal_add"><span class="fas fa-plus"></span></button></h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">No KTP</th>
                    <th scope="col">Calon Nasabah</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach($calon as $row):
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['no_ktp']; ?></td>
                    <td><?php echo $row['nama_nasabah']; ?></td>
                    <td><?php echo $row['no_hp']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                      <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#modal_simpan<?php echo $row['id_nasabah'];?>">Simpan</button>
                      <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal_pinjam<?php echo $row['id_nasabah'];?>">Pinjam</button>
                    </td>
                    <td>
                      <!--<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_see<?php echo $row['id_nasabah'];?>"><span class="far fa-eye"></span></button>-->
                      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_edit<?php echo $row['id_nasabah'];?>"><span class="far fa-edit"></span></button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $row['id_nasabah'];?>"><span class="fas fa-trash"></span></button>
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
                <h4 align="left" class="modal-title" id="myModalLabel">Tambah Calon Nasabah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'nasabah/add'?>" enctype="multipart/form-data">
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
                                <label>Nama Nasabah</label>
                                <input type="text" class="form-control" placeholder="Nama Nasabah" name="nama">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat">
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal">
                            </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Agama</label>
                                <select class="form-control">
                                  <option>--Agama--</option>
                                  <option value="islam">Islam</option>
                                  <option value="katholik">Katholik</option>
                                  <option value="kristen">Kristen</option>
                                  <option value="hindu">Hindu</option>
                                  <option value="budha">Budha</option>
                                  <option value="dll">dll</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="form-control" name="jk">
                                  <input type="radio" value="laki_laki"> Laki - Laki
                                  <input type="radio" value="perempuan"> Perempuan
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="number" class="form-control" placeholder="No HP" name="hp">
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
  foreach($calon as $i):
    $id=$i['id_nasabah'];
    $ktp=$i['no_ktp'];
    $nama=$i['nama_nasabah'];
    $tmpt=$i['tmp_lahir'];
    $tgl=$i['tgl_lahir'];
    $agama=$i['agama'];
    $jk=$i['jk'];
    $email=$i['email'];
    $hp=$i['no_hp'];
    $alamat=$i['alamat'];
?>

<!--MODAL EDIT CALON-->
<div class="modal fade" id="modal_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
            <div class="modal-dialog modal-lg modal-frame modal-top modal-notify" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 align="left" class="modal-title" id="myModalLabel">Edit Calon Nasabah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'nasabah/edit'?>" enctype="multipart/form-data">
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
                                <label>Nama Nasabah</label>
                                <input type="text" class="form-control" placeholder="Nama Nasabah" name="nama" value="<?php echo $nama;?>">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat" value="<?php echo $tmpt;?>">
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal" value="<?php echo $tgl;?>">
                            </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Agama</label>
                                <select class="form-control" name="agama">
                                  <option>-- Agama --</option>
                                  <option value="islam" <?php if($agama == 'islam'){echo"selected = 'selected'";}?>>Islam</option>
                                  <option value="katholik" <?php if($agama == 'katholik'){echo"selected = 'selected'";}?>>Katholik</option>
                                  <option value="kristen" <?php if($agama == 'kristen'){echo"selected = 'selected'";}?>>Kristen</option>
                                  <option value="hindu" <?php if($agama == 'hindu'){echo"selected = 'selected'";}?>>Hindu</option>
                                  <option value="budha" <?php if($agama == 'budha'){echo"selected = 'selected'";}?>>Budha</option>
                                  <option value="dll" <?php if($agama == 'dll'){echo"selected = 'selected'";}?>>dll</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="form-control" name="jk">
                                <?php if($jk =='laki_laki'){?>
                                  <input type="radio" value="laki_laki" checked> Laki - Laki
                                  <input type="radio" value="perempuan"> Perempuan
                                <?php }else{
                                ?>
                                  <input type="radio" value="laki_laki"> Laki - Laki
                                  <input type="radio" value="perempuan" checked> Perempuan
                                <?php
                                } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email;?>">
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="number" class="form-control" placeholder="No HP" name="hp" value="<?php echo $hp;?>">
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
                <h4 align="left" class="modal-title" id="myModalLabel">Hapus Calon Nasabah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'nasabah/hapus'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <p>Apakah anda yakin ingin menghapus nasabah <b><?php echo $nama;?></b>?</p>
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
<!--MODAL LIHAT CALON-->

<!--END-->
<!--MODAL SIMPAN-->
<div class="modal fade" id="modal_simpan<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
            <div class="modal-dialog modal-lg modal-frame modal-top modal-notify" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 align="left" class="modal-title" id="myModalLabel">Nasabah Simpan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'nasabah/simpan'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <label>Data Nasabah :</label>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>No KTP</label>
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <input type="hidden" name="kode" value="<?php echo $kode_sim;?>">
                                <input type="text" class="form-control" placeholder="No KTP" name="ktp" value="<?php echo $ktp;?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Nama Nasabah</label>
                                <input type="text" class="form-control" placeholder="Nama Nasabah" name="nama" value="<?php echo $nama;?>" readonly>
                            </div>
                        </div>
                      </div>
                      
                    
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email;?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="number" class="form-control" placeholder="No HP" name="hp" value="<?php echo $hp;?>" readonly>
                            </div>
                        </div>
                       
                    </div>

                    <label>Data Simpan :</label>
                    <?php
                      $tgll=date('Y-m-d');
                    ?>
                    <label style="float:right;">Tanggal :   <?php echo $tgll;?></label>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Tabungan Awal</label>
                                <input type="number" class="form-control" placeholder="Tabungan Awal" name="tab">
                                <input type="hidden" class="form-control" placeholder="Tanggal" name="tgl" value="<?php echo $tgll;?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Bunga</label>
                                <select name="bunga" class="form-control">
                                  <option>---- Bunga ----</option>
                                  <?php foreach($bunga as $b){?>
                                  <option value="<?php echo $b['jml_bunga']?>"><?php echo $b['jml_bunga']?></option>
                                  <?php }?>
                                </select>
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

<!--MODAL PINJAM-->
<div class="modal fade" id="modal_pinjam<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
            <div class="modal-dialog modal-lg modal-frame modal-top modal-notify" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 align="left" class="modal-title" id="myModalLabel">Nasabah Pinjam</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form name="formPinjam" class="form-horizontal" method="post" action="<?php echo base_url().'nasabah/pinjam'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <label>Data Nasabah :</label>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>No KTP</label>
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <input type="hidden" name="kode" value="<?php echo $kode_pin;?>">
                                <input type="text" class="form-control" placeholder="No KTP" name="ktp" value="<?php echo $ktp;?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Nama Nasabah</label>
                                <input type="text" class="form-control" placeholder="Nama Nasabah" name="nama" value="<?php echo $nama;?>" readonly>
                            </div>
                        </div>
                      </div>
                      
                    
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email;?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="number" class="form-control" placeholder="No HP" name="hp" value="<?php echo $hp;?>" readonly>
                            </div>
                        </div>
                       
                    </div>

                    <label>Data Pinjam :</label>
                    <?php
                      $tgll=date('Y-m-d');
                    ?>
                    <label style="float:right;">Tanggal Pinjaman :   <?php echo $tgll;?></label>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Pinjaman Awal</label>
                                <input type="number" class="form-control" placeholder="Pinjaman Awal" id="pinjam" name="pinjam">
                                <input type="hidden" class="form-control" placeholder="Tanggal" name="tgl" value="<?php echo $tgll;?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Lama Angsuran</label>
                                <input type="number" class="form-control" placeholder="Lama Angsuran (bulan)" name="waktu" id="waktu">
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Bunga</label>
                                <select name="bunga" class="form-control">
                                  <option>---- Bunga ----</option>
                                  <?php foreach($bunga as $b){?>
                                  <option value="<?php echo $b['jml_bunga']?>"><?php echo $b['jml_bunga']?></option>
                                  <?php }?>
                                </select>
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
<?php endforeach; ?>