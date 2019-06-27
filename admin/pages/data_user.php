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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        include_once("../../config/koneksi.php");

                        // Mengambil data dari "pictsgram"
                        
                        $result = mysqli_query($mysqli, "SELECT username , name , email, phone, status FROM user");
                        while($data = mysqli_fetch_array($result)){
                          echo "<tr>";
                          echo "<td>".$data['username']."</td>";
                          echo "<td>".$data['name']."</td>";
                          echo "<td>".$data['email']."</td>"; 
                          echo "<td>".$data['phone']."</td>";
                          echo "<td>".$data['status']."</td>";

                          echo "<td><a href='delete_user.php?username=".$data['username']."' class='btn btn-xs btn-danger'>Delete</a>
					                <a href='block_user.php?username=".$data['username']."' class='btn btn-xs btn-warning'>Block</a></td></tr>";    
                          echo "</tr>";
                        }

                    ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Status</th>
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
