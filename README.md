# gbg-assessment

No using any external directory besides basic jQuery (no jQuery validate or bootstrap for
example).
* Use basic CSS. this is not important for that test beside the points you were asked to do.
1. Create "users" table in database with the following columns:
• Username - varchar (100)
• Email - varchar(100)
• Password - varchar (100)
• Birthdate – date
• Phone number – varchar (10)
• URL – varchar (200)
2. Create form with fields matching the fields in the database. On submit, the form will
validate the information and insert it into to database.
Validations:
• Username – letters only (pass: gbggroup, fail: gbg_group12, gbg group).
• Email (pass: gbg@gbg-group.net, fail: gbg@group, gbg_group.net),
• Password: 8 chars min, 1 lowercase, 1 uppercase and 1 special sign at least.
There is no need to encrypt the password.
• Birthday (pass: any date forma. Fail: 84/56/0.
• URL - valid URL structure (pass: gigsberg.com. Fail: gigsbergcom).
• Phone number – Number only and 10 chars (pass: 1111111111, fail: 111, a11).
3. Create new page, in which it will display a table with username, email and delete
button.
4. When the mouse is over a row in the table, the background color of the row will
change. Every other line in the table needs to be another color.
5. On clicking the delete, show confirmation box and after confirming, the user will be
deleted from the database.

6. On clicking the username, a popup will show all the users' data.
• The data to the popup needs to be pulled by Ajax.
• The popup will be in the center of the screen and will not scroll with the page.
• The popup needs to have a close button.

## Installation Steps

1. Clone the repository.
2. Create a MySQL database :"gbg".
3. Add your credits in config.php
4. Run the following commands:
5. Start the application:

```
php -S localhost:8000
```

and open this URL in your browser `http://localhost:8000`