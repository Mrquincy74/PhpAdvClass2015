
<?php if ( isset($message)) : ?>
    <p class="bg-success"><?php echo $message; ?></p>
<?php endif; ?>
<?php if (is_array($err_message) && count($err_message) > 0) : ?>
    <ul class="list-group">
        <?php foreach ($err_message as $value) : ?>
            <li class="list-group-item list-group-item-danger"><?php echo $value; ?></li>  
            <?php endforeach; ?>
    </ul>

<?php endif; ?>
           






