<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">    </head>
    <body>
        <form action="../update" method="post">
            <input type="hidden" value="<?= $user['id']; ?>" name="id">
            <input type="text" value="<?= $user['name']; ?>" name="name" placeholder="name">
            <input type="text" name="email" value="<?= $user['email'];?>" placeholder="email">
            <input type="text" name="password" value="<?= $user['password']; ?>" placeholder="password">
            <input type="submit">  
        </form>
    </body>
</html>