Snap! CMS
=========

At the moment a very simple CMS (Content Management System), that will eventually be very advanced, without all the unwanted problems. Written in PHP, with MySQL databases to handle the storage, it doesn't get more robust and easier to get your website running with this CMS system. It features BootStrap integration, as well as CKEditor for right text editing in your webpages!

Requirements:
-PHP
-MySQL, and PHP-Myadmin (or another database tool)

HOW TO GET STARTED:
- Unzip the folder
- Open the file in the root directory named "Setup.php", then copy all the code inside the file
- Go to your PHP-Myadmin (or other tool) and create a new database (name it what you want)
- Open up a SQL Query, and paste all the code from "Setup.php" inside the Query, then select "Go"
- Close out of PHP-Myadmin (or your tool), then go back to your downloaded folder.
- Navigate to the /includes folder, and open the file named "Config.php".
- Edit the database information, be sure to enter your username, password, and the database name that you just created.
- Edit the site information, enter a name for the site, the site path it will be on the server, and the path to the administrator folder to be on the server. (The directory can be in the root)
- Save, and upload all the files to the directory you set in the config.php file. 
- Navigate to the URL to make sure your up and running. You can access the admin panel at the directory it is in /admin the default username and password is admin. 
- CURRENTLY TO CHANGE THE USERNAME AND PASSWORD, you have to log back into your database tool, select your database you installed, the choose the users table. Add a new entry. This will be fixed in future versions to be easier.

Current Features:
- Boostrap Integration (for responsiveness and support in most all browsers)
- Google Font Integration in CKEditor
- Create and Edit pages
- Create seperate admin accounts

Wanted/Upcoming Features:
- Ability to edit multiple content zones (Examples- A sidebar, pages banner, etc)
- A installer/configurer that doesn't require the user to setup all the files at first time use.
- More advanced Administrator Panel, with the ability to edit the database settings right there.
- In the future, remove CKEditor, and move to TinyMCE.
