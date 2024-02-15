<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <style>
    </style>
</head>
<body>
    <div>
    <h2>Users List</h2>
    <a href="/create">Create User</a>
    </div>
    <table id="usersTable">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><button class="deleteButton" data-userid="<?php echo $user['id']; ?>">Delete</button></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./View/usersList.js"></script>
</body>
</html>
