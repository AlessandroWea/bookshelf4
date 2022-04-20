  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Created</th>
                      <th>Role</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($users as $user): ?>
                        <tr>
                        <td><?=$user['id']?></td>
                        <td><?=$user['username']?></td>
                        <td><?=$user['email']?></td>
                        <td><?=$user['created']?></td>
                        <td><?=$user['role']?></td>
                        <!-- <td><span><i class="fas fa-eye"></i> </span> <span><i class="fas fa-ban"></i></span></td> -->
                        <!-- <td><i class="fas fa-eye mr-2"></i><i class="fas fa-ban"></i></td> -->
                        <td>
                          <a href="/admin/users/view/<?=$user['id']?>" class="text-success mr-1"><i class="fas fa-eye"></i></a>
                          <a href="/admin/users/delete/<?=$user['id']?>" class="text-danger"><i class="fas fa-ban"></i></a>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->