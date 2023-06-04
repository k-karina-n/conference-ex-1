# Virtual Conference [ Dev Exercise #1 ] 

2-page website to register for a virtual conference. 

- Written in plain PHP without a framework 
- Styled with TailwindCSS
- Used AlpineJS, HTMX 
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
**Make changes in config.php providing access to the database**
```
'username' => 'root',
'password' => ' ', 
```

**Open the console and go to a project root directory**
```
cd conference-ex-1
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
