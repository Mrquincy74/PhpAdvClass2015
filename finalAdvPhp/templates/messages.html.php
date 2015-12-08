<?php if ( isset($message) ) : ?>
<div class="success-message">
<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Success!</strong> <?php echo $message; ?>
</div>
</div>
<?php endif; ?>
