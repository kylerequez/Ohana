<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ohana Account</title>
</head>

<body>
    <?php
    require dirname(__DIR__) . '/Ohana/src/models/Account.php';

    $accounts = unserialize($_SESSION["accounts"]);

    echo "Request method: " . $_SERVER["REQUEST_METHOD"];
    ?>
    <form action="/accounts/create" method="POST">
        <table border=1>
            <thead>
                Create account<br>
            </thead>
            <tbody>
                <tr>Firstname: <input type="text" name="fname"></tr><br>
                <tr>Middlename: <input type="text" name="mname"></tr><br>
                <tr>Lastname: <input type="text" name="lname"></tr><br>
                <tr>Email: <input type="email" name="email"></tr><br>
                <tr>Number: <input type="text" name="number"></tr><br>
                <tr>
                    Type: <select name="type">
                        <option value="ADMINISTRATOR">Administrator</option>
                        <option value="STAFF">Staff</option>
                        <option value="USER">User</option>
                    </select>
                </tr><br>
                <tr>Password: <input type="password" name="password"></tr><br>
            </tbody>
            <tfooter>
                <input type="submit" value="Create">
            </tfooter>
        </table>
    </form>

    <table border=1>
        <thead>
            <th>ID</th>
            <th>Type</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Number</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            foreach ($accounts as $account) {
            ?>
                <tr>
                    <td><?php echo $account->getId(); ?></td>
                    <td><?php echo $account->getType(); ?></td>
                    <td><?php echo $account->getFullName(); ?></td>
                    <td><?php echo $account->getEmail(); ?></td>
                    <td><?php echo $account->getNumber(); ?></td>
                    <td><?php echo $account->getStatus(); ?></td>
                    <td>    
                        <form method="POST" action="/dashboard/staff/delete/<?php echo $account->getId(); ?>">
                            <input type="hidden" name="__method" value="DELETE">
                            <button type="submit" onclick="return confirm('Are you sure you want to delete account id <?php echo $account->getId(); ?>');">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    if(!empty($_SESSION["msg"]))
    {
        echo $_SESSION["msg"];
        unset($_SESSION["msg"]);
    }
    ?>
</body>

</html>