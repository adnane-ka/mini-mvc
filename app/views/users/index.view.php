<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/mini-mvc/" method="post">
        <input type="text" name="name" />
        <button type="submit">Create</button>
    </form>

    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php if(count($users) > 0){ foreach($users as $user){ ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td>
                        <div style="display: flex; gap:2px;">
                            <a href="/mini-mvc/<?php echo $user['id']; ?>">View</a>
                            <form action="/mini-mvc/<?php echo $user['id']; ?>" method="post">
                                <input type="hidden" name="REQUEST_METHOD" value="delete"/>
                                <button>Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php }} ?>
        </tbody>
    </table>
</body>
</html>