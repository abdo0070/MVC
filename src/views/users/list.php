<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">    </head>
    <body>
        
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>delete</th>
            <th>update</th>
        </tr>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user['id']; ?></td>
            <td><?= $user['name']; ?></td>
            <td><a href="delete/<?= $user['id']; ?>">delete</a></td>
            <td><a href="edit/<?= $user['id']; ?>">update</a></td>

        </tr>

        <?php endforeach; ?>
    </table>
    </body>
</html>