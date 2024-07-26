

## what is Middleware ?

Middleware is like a security guard standing at the front door. Before anyone can enter your house (or access your website), they have to pass through the security guard.
## In short:
Middleware is like a gatekeeper for your website. It controls who can access what, and can do other checks before letting people in.

Middleware can perform various tasks like:   
   1. Authentication and authorization   
   2. Save Log Information
   3. and much more...


## Types of Middleware in Laravel

    1. Route middleware
    2. Middleware Group
    3. Global middleware



   **Global middleware**
    - [These middleware run on every HTTP request to your application]().
    - [They are defined in the $middleware property of the Kernel class in app/Http/Kernel.php]().

      Examples of global middleware include:
        1. EncryptCookies
        2. AddQueuedCookiesToResponse
        3. StartSession
        4. VerifyCsrfToken

   **Route middleware**
      - [These middleware are assigned to specific routes. ]().
      - [They are defined in the $routeMiddleware property of the Kernel class in app/Http/Kernel.php]().

      Examples of route middleware include:
        1. auth (verifies user authentication)
        2. guest (verifies user is not authenticated)
        3. throttle (implements rate limiting)



