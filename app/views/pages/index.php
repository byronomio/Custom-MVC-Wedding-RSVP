<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flash('fail'); ?><?php flash('success'); ?>

<!-- Start if admin -->
<?php if ($_SESSION['user_status'] == 'admin') : ?>
  <!-- Start attending and not attening -->
  <div class="row">
    <div class="col-xl-6">
      <section class="card card-featured-left card-featured-tertiary">
        <div class="card-body">
          <div class="widget-summary">
            <div class="widget-summary-col widget-summary-col-icon">
              <div class="summary-icon badge-success">
                <i class="fas fa-thumbs-up"></i>
              </div>
            </div>
            <div class="widget-summary-col">
              <div class="summary">
                <h2 class="title">Attending</h2>
                <div class="info">
                  <strong class="amount"><?php echo $data['attending']; ?></strong>
                </div>
              </div>
              <div class="summary-footer">
                <a class="text-muted text-uppercase" href="#">(yay)</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="col-xl-6">
      <section class="card card-featured-left card-featured-quaternary">
        <div class="card-body">
          <div class="widget-summary">
            <div class="widget-summary-col widget-summary-col-icon">
              <div class="summary-icon badge-danger">
                <i class="fas fa-thumbs-down"></i>
              </div>
            </div>
            <div class="widget-summary-col">
              <div class="summary">
                <h2 class="title">Not Attending</h2>
                <div class="info">
                  <strong class="amount"><?php echo $data['notattending']; ?></strong>
                </div>
              </div>
              <div class="summary-footer">
                <a class="text-muted text-uppercase" href="#">(boo)</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <!-- End attending and not attening -->

  <!-- Start prefferences stats -->
  <div class="row">
    <div class="col-md-4">
      <section class="card  card-primary">
        <header class="card-header">
          <h2 class="card-title">Drinks</h2>
        </header>
        <div class="card-body">
          <?php echo 'Cooldrinks: ' . $data['cooldrink']; ?><br />
          <?php echo 'Alcahol: ' . $data['alcahol']; ?><br />
          <?php echo 'Water: ' . $data['water']; ?>
        </div>
      </section>
    </div>
    <div class="col-md-4">
      <section class="card card-quaternary">
        <header class="card-header">
          <h2 class="card-title">Food</h2>
        </header>
        <div class="card-body">
          <?php echo 'Meat: ' . $data['meat']; ?><br />
          <?php echo 'Vegan: ' . $data['vegan']; ?><br />
          <?php echo 'Nothing: ' . $data['nothing']; ?>
        </div>
      </section>
    </div>
    <div class="col-md-4">
      <section class="card card-tertiary">
        <header class="card-header">
          <h2 class="card-title">Accommodation</h2>
        </header>
        <div class="card-body">
          <?php echo 'Sleep Over: ' . $data['sleepover']; ?><br />
          <?php echo 'Sleep Home: ' . $data['sleephome']; ?><br />
          <?php echo 'Not Sleeping: ' . $data['notsleeping']; ?>
        </div>
      </section>
    </div>
  </div>
  <!-- End prefferences stats -->

  <!-- Start attending or not attending tables -->
  <div class="row">
    <div class="col-lg-6 d-inline-flex">
      <section class="card card-success col-12">
        <header class="card-header">
          <h2 class="card-title">Attending</h2>
        </header>
        <div class="card-body">
          <table class="table table-responsive-md table-striped mb-0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Drinks</th>
                <th>Food</th>
                <th>Accommodation</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data['guests'] as $guest)  if ($guest->rsvp == '1') {
                $prefferences = unserialize($guest->prefferences);
                $guestname = $guest->name;
                $guestdrinks = $prefferences['drinks'];
                $guestfood = $prefferences['foods'];
                $guestaccommodation = $prefferences['accommodation'];
              ?>
                <tr>
                  <th scope="row"><?php echo $guestname ?></th>
                  <td><?php echo $guestdrinks ?></td>
                  <td><?php echo $guestfood ?></td>
                  <td><?php echo $guestaccommodation ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>
    <div class="col-lg-6 d-inline-flex">
      <section class="card card-danger col-12">
        <header class="card-header">
          <h2 class="card-title">Not Attending</h2>
        </header>
        <div class="card-body">
          <table class="table table-responsive-md table-striped mb-0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Attending</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data['guests'] as $guest)  if ($guest->rsvp == '2') {
                $prefferences = unserialize($guest->prefferences);
                $guestname = $guest->name;
              ?>
                <tr>
                  <th scope="row"><?php echo $guestname ?></th>
                  <td><?php echo 'Not Attending' ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>
  <!-- End attending or not attending tables -->

  <!-- Start prefferences chart -->
  <div class="row">
    <div class="col-12">
      <section class="card card-dark">
        <header class="card-header">

          <h2 class="card-title">Prefferences</h2>
        </header>
        <div class="card-body">
          <div class="chart chart-md" id="flotBars"></div>

        </div>
      </section>
    </div>
  </div>
  <?php include APPROOT . '/views/partials/chart.php' ?>
  <!-- End prefferences chart -->

<?php endif; ?>
<!-- End if logged in -->

<!-- Start if not logged in -->
<?php if (empty($_SESSION['user_id'])) : ?>
  <div class="jumbotron jumbotron-flud text-center">
    <div class="container">

      <h1 class="display-3"><?php echo $data['title']; ?></h1>
      <p class="lead"><?php echo $data['description']; ?></p>
      <a class="btn btn-primary" href="/users/reserve" role="button">RSVP Now</a> <a class="btn btn-primary" href="/users/register" role="button">Add Post</a>
      
      
    </div>
  </div>
  
<?php endif; ?>
<!-- End if not logged in -->


<!-- Start if user -->
<?php if ($_SESSION['user_status'] == 'user') : ?>
<?php include APPROOT . '/views/partials/posts.php' ?>
<?php endif; ?>
<!-- End if user -->

<?php require APPROOT . '/views/inc/footer.php'; ?>
<?php
