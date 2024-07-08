<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <strong>ID</strong>: <?= $user['id']; ?>
    <br>
    <strong>NAME</strong>: <?= $user['name']; ?>
    <br>
    <form action="<?= url($user['id']); ?>" method="post">
        <input type="hidden" name="REQUEST_METHOD" value="patch"/>
        <input type="text" name="name" value="<?= $user['name']; ?>" />
        <button type="submit">Update</button>
    </form>
</body>
</html>