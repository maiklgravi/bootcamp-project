<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>contact</title>
</head>
<body>
<form action="<?php echo e(route('sendContact')); ?>" method="post">
<?php echo csrf_field(); ?>
<div>
<label for="name">введите имя</label>
<input type="text" name="name" id="name">
<button type="submit">
send
</button>
</div>
</form>
</body>
</html>
<?php /**PATH /var/www/resources/views/contact.blade.php ENDPATH**/ ?>