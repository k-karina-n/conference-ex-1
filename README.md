# Virtual Conference [ Dev Exercise #1 ] 

2-page website to register for a virtual conference. 

- Written in plain PHP without a framework 
- Styled with [TailwindCSS](https://tailwindcss.com/)
- Used [AlpineJS](https://alpinejs.dev/), [HTMX](https://htmx.org/) 
- Followed MVC architectural pattern

## Getting Started
These instructions will give you a copy of the project and running on your local machine for development and testing purposes. 

### Prerequisites
To run this project locally, you need:

- **PHP** >= 8.1.17
- **Composer** >= 2.5.4 

*You can find the installation instructions for these dependencies on their respective websites.*

## Installing
**Clone the repo**
```
git clone https://github.com/k-karina-n/conference-ex-1.git
```
**Open the console and go to a project root directory**
```
cd conference-ex-1
```

**Create a folder 'userPhoto' in a root directory**
```
mkdir userPhoto
```

**Change example.config.php to config.php**
```
mv example.config.php config.php
```
**Provide access to your database in config.php**
```
'username' => 'root',
'password' => ' ', 
```
**Create database 'conference' with a table 'user'**
```
mysql -u name -p

CREATE DATABASE conference;

USE conference;

CREATE TABLE user (ID INTEGER PRIMARY KEY AUTO_INCREMENT, 
first TEXT NOT NULL, last TEXT NOT NULL, 
phone CHAR(18) NOT NULL, email VARCHAR(255) NOT NULL UNIQUE, 
country TEXT NOT NULL, photo VARCHAR(255) NOT NULL, 
title TEXT NOT NULL, description TEXT NOT NULL, date DATE NOT NULL);
```

**Create dependencies**
```
composer install
composer dump-autoload
```

**Run project**
```
php -S localhost:9999
```
