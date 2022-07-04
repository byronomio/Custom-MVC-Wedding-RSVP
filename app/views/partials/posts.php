
<?php echo flash('success');?>
<div class="row mb-3">
  <div class="col-md-6">
    <h1>Guestbook</h1>
  </div>
  <div class="col-md-6">
    <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary float-end">
      <i class="fa fa-pencil"></i> Add Post
    </a>
  </div>
</div>
<?php foreach($data['posts'] as $post) : ?>
  <div class="card card-body mb-3">
    <h4 class="card-title"><?php echo $post->title; ?></h4>
    <p class="card-text py-2 mb-0"><?php echo $post->body; ?></p>
    <div class="bg-light">
      Written by <?php echo $post->name; ?><br/>
      Created at <?php echo $post->created_at; ?>
    </div>
    
    
    

    
    <hr>
    <div class="row mb-0">
      <div class="col">
      <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-primary">More</a>
      </div>
      <?php if ($post->user_id == $_SESSION['user_id']) : ?>
      <div class="col float-end">
      <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark  float-end">Edit</a>
      </div>
      <?php endif; ?>
    </div>
  
  </div>
<?php endforeach; ?>