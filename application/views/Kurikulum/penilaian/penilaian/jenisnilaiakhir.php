<!DOCTYPE html>
<html>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <center style="color:navy;">Jenis Nilai Akhir Mata Pelajaran SMP Yogyakarta <br></center>
        <center><small>Tahun Ajaran <?php echo $judul_tahun_ajaran; ?></small></center>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php">Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">

        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#lihatNA" data-toggle="tab">Lihat Jenis Nilai</a></li>
              <li ><a href="#tambahkurikulum" data-toggle="tab">Tambah Jenis Nilai</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tambahkurikulum">
               <form class="form-horizontal formmapel" method="post" action="<?php echo base_url('penilaian/penilaian/tambah_jenisnilai'); ?>">
                <div class="bigbox-mapel"> 
                  <div class="box-mapel">
                    <div class="form-group formgrup jarakform">
                      <label for="inputKurikulum" class="col-sm-2 control-label">Kode Jenis Nilai</label>
                      <div class="col-sm-6">
                        <input type="text" class="col-sm-2" name="kode" id="inputName" placeholder="Kode Jenis Nilai">
                      </div>
                    </div>
               
                    <div class="form-group formgrup jarakform">
                      <label for="inputKurikulum" class="col-sm-2 control-label">Nama Jenis Nilai</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" id="inputName" placeholder="Nama jenis Nilai">
                      </div>
                    </div>

                  </div>
                </div>
                <!-- <div class="tambahmapel">
                  <i class="fa fa-plus-circle text-red"></i><a style="color:red" href="#" id="tambahmapel"> Tambah jenis</a>
                </div> -->
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </form>

            </div>
            <!-- /.tab-pane -->

            <!-- /.tab-pane -->

            <div class="active tab-pane" id="lihatNA">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Jenis Nilai</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th class="fit">No</th>
                        <th>Jenis Nilai</th>
                        <th>Kode Nilai Akhir</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no=0;
                      foreach ($jenis_nilai_akhir as $a){
                        $no=$no+1;
                        echo "<tr>";
                        echo "<td>$no</td>"; 

                        echo "<td>{$a->Jenis_na}</td>";
                        echo "<td>{$a->kode_na}</td>";

                        echo "<td>"; ?>
                          <a data-toggle="modal" data-show="true" data-target="#editjenisnilai<?php echo $no; ?>" class="btn btn-block btn-primary button-action btnedit" href="<?php echo base_url("penilaian/penilaian/form_edit_jenisNilai/".$a->id_jenis_na); ?>" >Edit</a>
                          <a type="button" style="background: red ; border: red;" class="btn btn-block btn-primary button-action btnhapus " href="<?php echo base_url("penilaian/penilaian/hapus_jenisnilai/".$a->id_jenis_na); ?>" onclick="return confirm_delete();">Hapus</a>
                          <?php
                          echo "</tr>";
                          ?>

                          <div id="editjenisnilai<?php echo $no; ?>" class="modal fade " role="dialog">
                            <div class="modal-dialog modal-md" >
                              <div class="modal-content">
                                <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 class="modal-title">Edit Jenis Nilai</h4>
                               </div>
                               <div class="modal-body"> 
                               </div>
                             </div>
                           </div>

                         </div>
                         <?php
                       }
                       ?>
                     </tbody>
                   </table>
                 </div>
                 <!-- /.box-body -->
               </div>
             </div>

             
             <!-- /.tab-pane -->
           </div>
           <!-- /.tab-content -->
         </div>
         <!-- /.nav-tabs-custom -->
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row (main row) -->

   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 
 <script type="text/javascript">
  $(document).ready(function() {
      var max_fields      = 50; //maximum input boxes allowed
      var wrapper         = $(".bigbox-mapel"); //Fields wrapper
      var add_button      = $("#tambahmapel"); //Add button ID
      var box_mapel       = `<div class="box-mapel">
      <div class="form-group formgrup jarakform">
      <label for="inputKurikulum" class="col-sm-2 control-label">Nama Jenis Nilai</label>
      <div class="col-sm-4">
      <input type="text" class="form-control" id="inputName" placeholder="Nama jenis Nilai">
      </div>
      </div>

      <i class="fa fa-minus-circle text-red tambahmapel"></i><a style="color:red" href="#" class="remove_field"> Hapus jenis</a>

      </div>`;
      
      var x = 1; //initlal text box count
      $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
          if(x < max_fields){ //max input box allowed
              x++; //text box increment
              $(wrapper).append(box_mapel); //add input box
            }
          });
      
      $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
      })
    });
  </script>
  </html>

