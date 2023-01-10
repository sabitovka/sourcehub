<p align="center">
    <a href="https://donntu.ru/" target="_blank">
        <img src="https://donntu.ru/sites/default/files/images/gerb_donntu_large.jpg" height="150px">
    </a>
    <a href="http://asu-cs.donntu.ru/" target="_blank">
        <img src="http://asu-cs.donntu.ru/sites/default/files/22222_1.png" height="150px">
    </a>
    <h1 align="center">Donetsk National Technical University</h1>
    <h2 align="center">Department of Automated Control Systems</h2>
    <br>
</p>

<h1 align="center">Source<span style="color: orange;">Hub</span> project</h1>

ABOUT
----------------

The web-oriented free software information and search engine `"SourceHub"` is designed to simplify the search and download of free and freely distributed software.

The purpose of creating the system is to simplify and speed up the search for free software for the needs of the user, as well as to provide tracking of software download statistics for the developer of this project.

The system was developed as part of the course "Designing web-oriented computer systems". The following main functions were also implemented:

- View the list of software
- Search by text query
- View information about the software: description, author, categories
- Uploading and downloading project files
- Creating a new project profile
- Editing the project profile
- Standard authorization handling on cookies
- View project download statistics
- Commenting on projects

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

~~~
- PHP 7.2 or higher
- MySQL 8.0
- Composer
~~~

INSTALLATION
------------
Clone the project
```
git clone git@github.com:sabitovka/sourcehub.git
cd sourcehub
```

Then install the project 3rd-party packages:

~~~
composer install
~~~

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=sourcehub',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.

Apply migrations running the following:
```
php yii migrate
```

Run the application with:
```
cd web && php -S 0.0.0.0:8080
```

Now you should be able to access the application through the following URL.

~~~
http://localhost:8080/
~~~