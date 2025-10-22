  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="dashboard.php" class="brand-link">
          <img src="assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <?php if($_SESSION['admin']['email'] == 'reyad0@gmail.com'):?>
                  <img src="assets/img/about/dev1.jpg" class="img-circle elevation-2" alt="User Image">
                  <?php else:?>
                  <img src="assets/img/about/dev2.jpg" class="img-circle elevation-2" alt="User Image">
                  <?php endif ?>
              </div>
              <div class="info">
                  <a href="#" class="d-block"><?=$_SESSION['admin']['name']??'Admin'?></a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item ">
                      <a href="admin_index.php?page=dashboard"
                          class="nav-link <?php echo $status=="Dashboard" ? "active" :""; ?>">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="admin_index.php?page=product"
                          class="nav-link <?php echo $status=="Product" ? "active" :"";?>">
                          <i class="nav-icon fas fa-box-open"></i>
                          <p>Products</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="admin_index.php?page=category"
                          class="nav-link <?php echo $status=="Category" ? "active" :"";?>">
                          <i class="nav-icon fas fa-th-list"></i>
                          <p>Categories</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="admin_index.php?page=brand"
                          class="nav-link <?php echo $status=="Brand" ? "active" :"";?>">
                          <i class="nav-icon fas fa-tags"></i>
                          <p>Brands</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="admin_index.php?page=user" class="nav-link <?php echo $status=="User" ? "active" :"";?>">
                          <i class="nav-icon fas fa-users"></i>
                          <p>Users</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="admin_index.php?page=order"
                          class="nav-link <?php echo $status=="Order" ? "active" :"";?>">
                          <i class="nav-icon fas fa-shopping-cart"></i>
                          <p>Orders</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="admin_index.php?page=contact"
                          class="nav-link <?php echo $status=="Contact" ? "active" :"";?>">
                          <i class="nav-icon fas fa-envelope"></i>
                          <p>Contacts</p>
                      </a>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
      <!-- /.sidebar -->
  </aside>