# Track Time

Time tracking application 

*Characteristics*
---------
* Start a tracker that counts the spent time with single click
* Pause and resume time
* Book time for tasks with: name, description, date and time of the tracking
* Overview for all tracked times with pagination
* Search functionality that searches/filters all descriptions of every tracked time
* Responsive to screen size

*Technologies*
---------
* Front end - HTML, Javascript, CSS
* Back end - PHP
* Database - MySQL

_**Note:** No frameworks where used_

*Reminders*
-------------
To work with this project or run it locally, you need to:

* Verify that you have a local server environment to run all PHP files _(suggestion `MAMP`)_
  * The project should be inside the `Document root` of your web server _(usually `htdocs` folder)_
  * Once your server is running, you can run files through the following path
    * _`http://localhost:[port-number]/track-time/[folder]/[file.php]`_
* Make sure you create a database _(name suggestion `time_tracker`)_
* Change database information at the following files _(found at the `db` folder)_:
  * `db_connect.php`
  * `create_table.php` -  run this file to create a new table at your db
  * `seeder.php` -  run this file to populate the new table
* To check if everything is working fine you can follow the test suggestions _(found at the `test` folder)_


Bug tracker
-----------

[Issues - MarjorieCelestino/track-time](https://github.com/MarjorieCelestino/track-time/issues)
