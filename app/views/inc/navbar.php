<!-- start: header -->
<header class="header header-nav-menu">
  <div class="logo-container">


    <!-- start: header nav menu -->

    <div class="header-nav col-12">
      <div class="header-nav-main col-12 header-nav-main-effect-1 header-nav-main-sub-effect-1">
        <nav>
          <ul class="nav nav-pills float-start" id="mainNav">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/reserve">RSVP</a>
            </li>
          </ul>
          <ul class="nav float-end">
            <?php if (isset($_SESSION['user_id'])) : ?>
              <li class="nav-item pe-none">
                <a class="nav-link pe-none" style='color:black;' href="#">Welcome <?php echo $_SESSION['user_name']; ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/posts">Guestbook</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
              </li>
            <?php endif; ?>
          </ul>
          </ul>
        </nav>
      </div>
    </div>
    <!-- end: header nav menu -->
  </div>

  <!-- start: search & user box -->

  <!-- end: search & user box -->
</header>
<!-- end: header -->