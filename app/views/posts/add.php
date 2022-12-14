<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/posts" class="mb-3 btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light">
            <h2>Add Post</h2>
            <p>Create a post with this form</p>
            <form action="<?php echo URLROOT; ?>/posts/add" method="post">
                <div class="form-group">
                    <label for="title">Title: <sup>*</sup></label>
                    <input type="title" name="title" class="form-control form-control< ?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                    <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="body">Body: <sup>*</sup></label>
                    <textarea name="body" class="form-control form-control< ?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
                    <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
                </div>
                <div class="row pt-3">
                    <div class="col">
                        <input type="submit" value="Add Post" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>