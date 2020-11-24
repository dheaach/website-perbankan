<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-6 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <a href="<?php echo base_url('nasabah/real_simpan')?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <span class="h2 font-weight-bold mb-0">Nasabah Simpan</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                        <i class="fas fa-users text-white"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
        
            <div class="col-xl-6 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <a href="<?php echo base_url('nasabah/real_pinjam')?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <span class="h2 font-weight-bold mb-0">Nasabah Pinjam</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-users text-white"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
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
              <h3 class="mb-0">Nasabah Simpan</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">No KTP</th>
                    <th scope="col">Nasabah</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Bunga</th>
                    <th scope="col">Angka Tabungan</th>
                    <th scope="col">Saldo</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach($nasabah as $row):
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['no_ktp']; ?></td>
                    <td><?php echo $row['nama_nasabah']; ?></td>
                    <td><?php echo $row['tgl_simpan']; ?></td>
                    <td><?php echo $row['id_bunga']; ?>%</td>
                    <td><?php echo 'Rp. '.number_format($row['jml_simpan'],0,",","."); ?></td>
                    <td><?php echo 'Rp. '.number_format($row['total_simpan'],0,",","."); ?></td>
                    
                    
                    <td>
                      <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#modal_tabung<?php echo $row['id_simpan'];?>">Tabung</button>
                      <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal_ambil<?php echo $row['id_simpan'];?>">Pengambilan</button>
                      <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#modal_detail<?php echo $row['id_simpan'];?>">Detail</button>
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
<!--END-->
<?php 
  foreach($det as $i):
    $id=$i['id_simpan'];
?>

<!--MODAL EDIT CALON-->
<div class="modal fade" id="modal_tabung<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
            <div class="modal-dialog modal-lg modal-frame modal-top modal-notify" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 align="left" class="modal-title" id="myModalLabel">Tabungan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'nasabah/tabung'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>No KTP</label>
                                <input type="hidden" name="id_sim" value="<?php echo $id;?>">
                                <input type="hidden" name="id_nas" value="<?php echo $i['id_nasabah'];?>">
                                <input type="text" class="form-control" placeholder="No KTP" name="ktp" value="<?php echo $i['no_ktp'];?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Nama Nasabah</label>
                                <input type="text" class="form-control" placeholder="Nama Nasabah" name="nama" value="<?php echo $i['nama_nasabah'];?>" readonly>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <?php
                            $tgll=date('Y-m-d');
                          ?>
                          <label style="float:right;">Tanggal :   <?php echo $tgll;?></label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Saldo Sebelumnya</label>
                                <input type="number" class="form-control" placeholder="Saldo Sebelumnya" name="saldo" value="<?php echo $i['total_simpan'];?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Tabungan</label>
                                <input type="number" class="form-control" placeholder="Tabungan" name="tab" value="<?php echo $i['jml_simpan'];?>" readonly>
                            </div>
                        </div>
                      </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button type="submit" class="btn btn-success">Tabung</button>
                </div>
            </form>
            </div>
            </div>
        </div>

<!--END-->
<!--MODAL EDIT CALON-->
<div class="modal fade" id="modal_ambil<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
            <div class="modal-dialog modal-lg modal-frame modal-top modal-notify" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 align="left" class="modal-title" id="myModalLabel">Pengambilan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'nasabah/ambil'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>No KTP</label>
                                <input type="hidden" name="id_sim" value="<?php echo $id;?>">
                                <input type="hidden" name="id_nas" value="<?php echo $i['id_nasabah'];?>">
                                <input type="text" class="form-control" placeholder="No KTP" name="ktp" value="<?php echo $i['no_ktp'];?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Nama Nasabah</label>
                                <input type="text" class="form-control" placeholder="Nama Nasabah" name="nama" value="<?php echo $i['nama_nasabah'];?>" readonly>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <?php
                            $tgll=date('Y-m-d');
                          ?>
                          <label style="float:right;">Tanggal :   <?php echo $tgll;?></label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Saldo</label>
                                <input type="number" class="form-control" placeholder="Saldo" name="saldo" value="<?php echo $i['total_simpan'];?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Pengambilan</label>
                                <input type="number" class="form-control" placeholder="Pengambilan" name="ambil">
                            </div>
                        </div>
                      </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button type="submit" class="btn btn-danger">Ambil</button>
                </div>
            </form>
            </div>
            </div>
        </div>

<!--END-->
<!--MODAL HAPUS CALON-->
<div class="modal fade" id="modal_detail<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
            <div class="modal-dialog modal-lg modal-frame modal-top modal-notify" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 align="left" class="modal-title" id="myModalLabel">Detail Tabungan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="" align="right" style="margin-right:50px;">
              <input class="btn btn-primary" type="button" onclick="printDiv('printableArea')" value="Print" />
            </div>
            <div id="printableArea">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-3">Nama Nasabah</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-4"><?php echo $i['nama_nasabah'];?></div>
                  </div>
                  <br/>
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Tabungan</th>
                          <th scope="col">Pengambilan</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $no = 1;
                        foreach($det as $row):
                      ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $row['tgl_ang_sim']; ?></td>
                          <td><?php echo 'Rp. '.number_format($row['jml_tab'],0,",","."); ?></td>
                          <td></td>
                        </tr>
                        <?php
                          $no++;
                          endforeach;
                        ?>
                        <?php
                        foreach($ambil as $baris):
                      ?>
                        <tr>
                          <td></td>
                          <td><?php echo $baris['tgl_ambil']; ?></td>
                          <td></td>
                          <td><?php echo 'Rp. '.number_format($baris['jml_ambil'],0,",","."); ?></td>
                        </tr>
                        <?php
                          $no++;
                          endforeach;
                        ?>
                      </tbody>
                      <tfoot>
                        <?php
                        foreach($nasabah as $row):
                        ?> 
                        <tr>
                          <td colspan="3" align="right">Bunga : </td>
                          <td><b><?php echo $row['id_bunga'];?>%</b></td>
                        </tr>
                        <tr class="text-danger">
                          <td colspan="3" align="right">Saldo Akhir : </td>
                          <td><?php echo 'Rp. '.number_format($row['total_simpan'],0,",","."); ?></td>
                        </tr>
                        <?php
                          endforeach;
                        ?>
                      </tfoot>
                    </table>  
                </div>
                <div class="modal-footer">
                    
                </div>
              </div>
            </div>
            </div>
        </div>

<!--END-->
<!--MODAL LIHAT CALON-->

<!--END-->
<?php endforeach; ?> 