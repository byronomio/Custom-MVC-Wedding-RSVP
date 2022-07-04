<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light">
      <?php flash('success'); ?>
        <h2>RSVP</h2>
        <p>Are you coming to the wedding?</p>
        <form action="<?php echo URLROOT; ?>/users/reserve" method="post">
          <div class="form-group">
            <label for="name">Name: <sup>*</sup></label>
            <input type="text" name="name" class="form-control form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
          <label for="" class="rsvp">Yes or No *</label>
            <select class="form-control" name="rsvp" id="rsvp">
              <option value='1'>Yes</option>
              <option value='2'>No</option>              
            </select>
          </div>
          
          <div class="mt-3">
            <div class="col-3 col-sx-12">
              <input type="submit" value="Submit" class="btn btn-success btn-block">
            </div>
           
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
