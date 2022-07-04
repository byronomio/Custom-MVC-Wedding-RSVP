<?php require APPROOT . '/views/inc/header.php'; ?>
<?php echo flash('success'); ?>
<a href="<?php echo URLROOT; ?>/posts" class="mb-3 btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body b-3">
  <h1><?php echo $data['post']->title; ?></h1>
  <p><?php echo $data['post']->body; ?></p>
  <p>Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?></p>
  <form class='mb-0' action="<?php echo URLROOT; ?>/posts/show/<?php echo $data['post']->id; ?>" method="post">
    <div class="form-group">
      <label for="comment">Add Comment: <sup>*</sup></label>
      <input type="comment" name="comment" class="form-control form-control< ?php echo (!empty($data['comment_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['comment']; ?>">
      <span class="invalid-feedback"><?php echo $data['comment_err']; ?></span>
    </div>

    <div class="row pt-3">
      <div class="col">
        <input type="submit" value="Add Comment" class="btn mb-0 btn-primary btn-block">
      </div>
    </div>
  </form>
  <?php if ($data['comments']) : ?>
    <hr>
    <?php foreach ($data['comments'] as $comment) : ?>
      <div class="card">
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p><?php echo $comment->comment; ?></p>
          </blockquote>
          by <cite title="Comment Author"><?php echo $data['commentsauthor']->name; ?></cite>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
  <?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
    <hr>
    <div class="row mb-0">
      <div class="col">
        <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark">Edit</a>
      </div>
      <div class="col float-end">
        <form class="pull-right mb-0" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
          <input type="submit" value="Delete" class="btn btn-danger">
        </form>
      </div>
    </div>
  <?php endif; ?>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>