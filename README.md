## About this solution

Solution has been build on top of Laravel for simplicity. Everything you need to check is under "app" folder.

## Architecture

I have implemented clean code principles, but not more complex architectures like hexagonal-DDD, patterns like CQRS and others,
because for this simple case is not needed. Instead common MVC has been implemented.

## What can you find

In this simple example, you can find a new user creation

- Service dependency injection
- Repositories dependency inversion
- Service is transactional
- Event generation
- No direct mail is called from the service. Service generates an event, and then the listener queues a mailable
- Async queue
- Request input data validation

## Benefits

- Controller has no responsibility in the creation of the user. It only gets data and return processed data.
- All the logic is managed by services or handlers
- Input data are previously validated. Information that arrives to the controller is already checked by Request. In
  addition, it can be also previously validated by custom middlewares.
- Non primary tasks, like sending a mailable, is not managed in a synced way. Instead a new job is sent to a queue.
- All the process is surrounded with a try-catch formula, which allows app to encapsulate errors (and also register
  them. Ex: keep a log, send errors to Sentry, send errors to other channels, etc.)
- All the I/O db tasks are managed by repositories. This also allows us to use a query object pattern.
- Dependency inversion is quite useful in this case to mock the repository.
- This layer organisation allows to test each part of the code, makes code reusable and maintainable.

## Disclaimer

This project is not functional:

- Many items are not being implemented like DB migrations, mail views or routes.
- Queue drivers like Redis are not defined.
- No security is implemented, access is public to everyone.
- This project does not include testing.
- Created user has no password.

## Improvements

- For big applications, hexagonal can bring us some important benefits.
- Also making our classes more framework agnostic, using adapter patterns and others, allows us to make application more
  maintainable over time.
