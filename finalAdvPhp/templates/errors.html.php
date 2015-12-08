
<?php if ( isset($errors) && is_array($errors) ) : ?>
<div class="error-message">
       <?php foreach ($errors as $err): ?>
<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Error!</strong> <?php echo $err; ?>
</div>
     <?php endforeach; ?>
</div>      
   
<?php endif; ?>
