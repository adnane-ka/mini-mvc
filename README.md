# MINI MVC

This project was designed to build lightweight PHP applications based on the MVC design pattern. It was inspired by Laravel to streamline development & provide easy use.

For a better saying, it's the lumen version for the lumen micro-framework.

## Installation
1. Download or clone the repository.
2. Move the project folder to `xampp/htdocs`.
3. Run `composer install` & `composer dump-autoload` if needed.
4. Run `touch .env` to create an env file.
5. Copy `.env.example` content to `.env`.
6. Inject the project folder name as `SUB_DIRECTORY` value in `.env` file.
7. Prepare & Inject your database credentials in `.env` file.
8. That's it!

## Project Structure

This project is organized into three primary components:

- **Models**: Located in [app/models](app/models)
- **Controllers**: Located in [app/controllers](app/controllers)
- **Views**: Located in [app/views](app/views)

## Core Components

The foundational components of this project include:

- **Base Model Class**: [core/BaseModel.php](core/BaseModel.php)
- **Router Handler Class**: [core/Router.php](core/Router.php)
- **Request Handler Class**: [core/Request.php](core/Request.php)
- **View Handler Class**: [core/View.php](core/View.php)
- **Database Connection Handler Class**: [core/Database/DBConnection.php](core/Database/DBConnection.php)
- **Query Builder Class**: [core/Database/QueryBuilder.php](core/Database/QueryBuilder.php)

## Implementation Overview

1. All requests are routed through [index.php](index.php) as specified by the [.htaccess](.htaccess) file.
2. The router handler class includes the target controller and invokes the corresponding method as defined in [routes.php](routes.php).
3. The target controller interacts with models, leveraging the [BaseModel](core/BaseModel.php) class which utilizes a Query Builder to facilitate database interactions following an object-oriented paradiagm.
4. The target controller renders the appropriate view.

## Future Enhancements

- Additional ORM implementations and Query Builder methods
- More utility/helper methods
- A mini template engine for view management
- A mini exception handler for improved error handling
- And much more ..

We welcome and actively encourage contributions to this project. Whether you want to report bugs, suggest new features, or improve the existing code, your input is valuable. Join us in making this project better by submitting pull requests, participating in discussions, and sharing your expertise.