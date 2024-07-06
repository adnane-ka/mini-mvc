<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
        </thead>
        <tbody>
            <?php foreach($users as $user){ ?>
                <tr>
                    <td> <?php  echo $user['id']; ?></td>
                    <td> <?php  echo $user['name']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>