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
              <h3 class="mb-0">Bunga <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"data-target="#modal_add"><span class="fas fa-plus"></span></button></h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jumlah Bunga</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach($bunga as $row):
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['jml_bunga']; ?>%</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_edit<?php echo $row['id_bunga'];?>"><span class="far fa-edit"></span></button>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $row['id_bunga'];?>"><span class="fas fa-trash"></span></button>
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
            <div class="modal-dialog modal-frame modal-top modal-notify" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 align="left" class="modal-title" id="myModalLabel">Tambah Bunga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'bunga/add'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>Jumlah Bunga</label>
                                <input type="number" name="bunga" class="form-control">
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
  foreach($bunga as $i):
    $id=$i['id_bunga'];
    $nama=$i['jml_bunga'];
?>

<!--MODAL EDIT CALON-->
<div class="modal fade" id="modal_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
            <div class="modal-dialog modal-frame modal-top modal-notify" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 align="left" class="modal-title" id="myModalLabel">Edit Bunga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'bunga/edit'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>Jumlah Bunga</label>
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <input type="number" class="form-control" placeholder="Bunga" name="bunga" value="<?php echo $nama;?>" readonly>
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
                <h4 align="left" class="modal-title" id="myModalLabel">Hapus Bunga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'bunga/hapus'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <p>Apakah anda yakin ingin menghapus bunga ?</p>
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