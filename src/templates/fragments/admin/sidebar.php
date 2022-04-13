  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center">
      <span class="brand-text font-weight-light">Bookshelf</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                  <a href="/admin/users" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                      Users
                      <span class="badge badge-info right"><?=$users_count?></span>
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admin/reviews" class="nav-link">
                    <i class="nav-icon fas fa-align-justify"></i>
                    <p>
                      Reviews
                      <span class="badge badge-info right"><?=$reviews_count?></span>
                    </p>
                  </a>
                </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>