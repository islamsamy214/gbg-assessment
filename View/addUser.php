<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>    
    <form id="userForm" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>

        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate"><br><br>

        <label for="phone">Phone number:</label>
        <input type="text" id="phone" name="phone"><br><br>

        <label for="url">URL:</label>
        <input type="text" id="url" name="url"><br><br>

        <input type="submit" value="Submit">
    </form>
    <a href="/">Back to list</a>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./View/addUser.js"></script>
</html>
