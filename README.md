# MINI MVC

This project was designed to build lightweight PHP applications based on the MVC architecture. It was inspired by Laravel to streamline development & provide easy use.

For a better saying, it's the lumen version for the lumen micro-framework.

## Installation
1. Download or clone the repository.
2. Run `composer install`.
3. Run `touch .env` to create an env file.
4. Copy `.env.example` content to `.env`.
6. Inject your mysql database credentials in `.env` file.
7. Run `php run db:migrate` for database migration.
8. Run `php run dev` to preview the project on your local webserver.

## How to Use

If you intend to use this micro framework for a personal project, you can ignore the `core` directory unless you need to override existing functionality. All your application files should reside in the `app` directory, as you can use `routes.php` for route definition. 

If you wish to contribute to this project, you are welcome to enhance or override the existing functionality in the `core` directory.

## Project Structure

This project is organized into three primary components:

- **Models**: Located at [app/models](app/models)
- **Views**: Located at [app/views](app/views)
- **Controllers**: Located at [app/controllers](app/controllers)

## Core Components

The foundational components of this project include:

- **Base Model Class**: [core/BaseModel.php](core/BaseModel.php)
- **Base Controller Class**: [core/BaseController.php](core/BaseController.php)
- **Router Handler Class**: [core/Router.php](core/Router.php)
- **Request Handler Class**: [core/Request.php](core/Request.php)
- **View Handler Class**: [core/View.php](core/View.php)
- **Database Connection Handler Class**: [core/Database/DBConnection.php](core/Database/DBConnection.php)
- **Query Builder Class**: [core/Database/QueryBuilder.php](core/Database/QueryBuilder.php)
- **Command Handler Class**: [core/CommandHandler.php](core/CommandHandler.php)
- **A set of helper functions**: [core/helpers.php](core/helpers.php)

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
- Sanitization & data validating
- And much more ..

We welcome and actively encourage contributions to this project. Whether you want to report bugs, suggest new features, or improve the existing code, your input is valuable. Join us in making this project better by submitting pull requests, participating in discussions, and sharing your expertise.