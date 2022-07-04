<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light">
        <h2>Your Prefferences</h2>
        <p>Please choose your drinks, food and accommodation</p>
        <form action="<?php echo URLROOT; ?>/users/prefferences" method="post">
        <div class="form-group hidden">
          <input type="hidden" name="email" class="form-control form-control-lg" value="<?php echo $_COOKIE['wedding_email']; ?>"></div>
        <div class="form-group">
          <label for="" class="form-label">Drinks *</label>
          <select class="form-control" name="prefferences[drinks]" id="" aria-label="Drinks">
            <option>Cooldrink</option>
            <option>Alcahol</option>
            <option>Water</option>
          </select>
        </div>
        <div class="form-group">
          <label for="" class="form-label">Food *</label>
          <select class="form-control" name="prefferences[foods]" id="" aria-label="Foods">
            <option>Meat</option>
            <option>Vegan</option>
            <option>Nothing</option>
          </select>
        </div>
        <div class="form-group">
          <label for="" class="form-label">Accommodation *</label>
          <select class="form-control" name="prefferences[accommodation]" id="" aria-label="Accommodation">
            <option>Sleep Over</option>
            <option>Sleep Home</option>
            <option>Not Sleeping</option>
          </select>
        </div>
         
          <div class="row pt-3">
            <div class="col-3 col-sx-12">
              <input type="submit" value="Submit" class="btn btn-success btn-block">
            </div>
           
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
