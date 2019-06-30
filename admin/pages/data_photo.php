<?php
 include("main_header.php");           
  
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Photos
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Photo</th>
                  <th>Caption</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    include_once("../../config/koneksi.php");
                    // Mengambil data dari "pictsgram"
                    $result = mysqli_query($mysqli, "SELECT * FROM post");
                    while($daftar = mysqli_fetch_array($result)){
                          echo "<tr>";
                          echo "<td>".$daftar['USERNAME']."</td>";
                          echo "<td><img class='thumbnail' style='width:150px;' src='../../images/post/".$daftar['IMAGE']."'></td>";
                          echo "<td>".$daftar['CAPTION']."</td>"; 
                          echo "<td><a href='delete_post.php?id_post=".$daftar['ID_POST']."' class='btn btn-block btn-danger'><i class='glyphicon glyphicon-trash'></i></a></td>";
						echo "</tr>";						
                    }
                ?>   

                </tbody>
                <tfoot>
                <tr>
                  <th>Username</th>
                  <th>Photo</th>
                  <th>Caption</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
	include("main_footer.php");
?>
