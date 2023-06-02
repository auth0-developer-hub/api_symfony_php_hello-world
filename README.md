# Symfony/PHP: Starter API Code Sample

This PHP code sample demonstrates how to build an API server using Symfony that is secure by design.

Visit the ["Symfony/PHP Code Samples: API Security in Action"](https://developer.auth0.com/resources/code-samples/api/symfony) section of the ["Auth0 Developer Resources"](https://developer.auth0.com/resources) to explore how you can secure Symfony applications written in PHP by implementing endpoint protection and authorization with Auth0.

## Why Use Auth0?

Auth0 is a flexible drop-in solution to add authentication and authorization services to your applications. Your team and organization can avoid the cost, time, and risk that come with building your own solution to authenticate and authorize users. We offer tons of guidance and SDKs for you to get started and [integrate Auth0 into your stack easily](https://developer.auth0.com/resources/code-samples/full-stack).

## Set Up and Run the Symfony Project

To get the project up and running, you'll need to:

1. Create a `.env` file:

```bash
touch .env
```

2. Populate it with the following environment variables — `PORT` and `CLIENT_ORIGIN_URL`:

```bash
PORT=6060
CLIENT_ORIGIN_URL=http://localhost:4040
```

Feel free to change the default values to meet your needs.

3. Install the project dependencies:

```bash
composer install
```

4. Run the project:

```bash
php -S localhost:6060 -t public
```

You can also install [Symfony CLI](https://symfony.com/download), and run the following command:

```bash
symfony serve --no-tls --port 6060
```

Those commands should be executed from the project's root folder.
