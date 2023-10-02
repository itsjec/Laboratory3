<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="<?= base_URL() ?>assets/admin/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="<?= base_URL() ?>assets/admin/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="<?= base_URL() ?>assets/admin/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                  <span>Gold Member</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items active <?php if(isset($active) && $active === 'products') echo 'active' ?>">
              <a class="nav-link" href="<?= base_url('Showadmin') ?>">
                  <span class="menu-icon">
                      <i class="mdi mdi-speedometer"></i>
                  </span>
                  <span class="menu-title">Products</span>
              </a>
          </li>
          <li class="nav-item menu-items  <?php if(isset($active) && $active === 'addproduct') echo 'active' ?>">
            <a class="nav-link" data-toggle="collapse" href="/AddProduct.php" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Add New Product</span>
            </a>
          </li>
          <li class="nav-item menu-items  <?php if(isset($active) && $active === 'updateproduct') echo 'active' ?>">
            <a class="nav-link" data-toggle="collapse" href="/adminUpdate.php" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Update Product</span>
            </a>
          </li>
          <li class="nav-item menu-items <?php if(isset($active) && $active === 'logout') echo 'active' ?>">
            <a class="nav-link" href="/login.php">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Log Out</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->