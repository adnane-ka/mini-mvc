<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <strong>ID</strong>: <?php echo $user['id']; ?>
    <br>
    <strong>NAME</strong>: <?php echo $user['name']; ?>
    <br>
    <form action="/<?php echo $user['id']; ?>" method="post">
        <input type="hidden" name="REQUEST_METHOD" value="patch"/>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" />
        <button type="submit">Update</button>
    </form>
</body>
</html>