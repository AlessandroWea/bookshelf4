  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Reviews</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Reviews</li>
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
                      <th>Theme</th>
                      <th>Authorname</th>
                      <th>Bookname </th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($reviews as $review): ?>
                        <tr>
                        <td><?=$review['id']?></td>
                        <td><?=$review['username']?></td>
                        <td><?=$review['theme']?></td>
                        <td><?=$review['authorname']?></td>
                        <td><?=$review['bookname']?></td>
                        <td>
                          <a href="/admin/reviews/view/<?=$review['id']?>" class="text-success mr-1"><i class="fas fa-eye"></i></a>
                          <a href="/admin/reviews/delete/<?=$review['id']?>" class="text-danger"><i class="fas fa-ban"></i></a>
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
      <nav>
        <ul class="pagination">
          <?php if($total_pages > $number_of_page_links): ?>
            
            <?php if($page != 1): ?>
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <?php endif; ?>

            <?php for($i = 0; $i < $number_of_page_links; $i++): ?>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
            <?php endfor; ?>
            <?php if($page == $total_pages): ?>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            <?php endif; ?>

          <?php endif; ?>
        </ul>
      </nav>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->