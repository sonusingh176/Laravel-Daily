

## Authentication 

Sometimes you might want to allow users to access certain pages only when they are authenticated, so In Laravel we have some ways to do
this.you can use any one.
    - 1. Session Based Authentication (one of the oldest way).
    - 2. Manually Authentication with Auth Class.
    - 3. Starter Kit.
    - 4. API Authentication

## Session Based Authentication :-
 Session-based authentication is a stateful authentication technique where we use sessions to keep track of the authenticated user.Here is how Session Based Authentication works:

    - User submits the login request for authentication.

    - Server validates the credentials. If the credentials are valid, the server initiates a session and stores some information about the client. This information can be stored in memory, file system, or database. The server also generates a unique identifier that it can later use to retrieve this session information from the storage. Server sends this unique session identifier to the client.

    - Client saves the session id in a cookie and this cookie is sent to the server in each request made after the authentication.

    - Server, upon receiving a request, checks if the session id is present in the request and uses this session id to get information about the client.

    And that is how session-based authentication works.

<!-- ************************************************************ -->

## Manually Authentication with Auth Class :-

Laravel's Auth class provides a convenient way to handle user authentication and authorization within your application.It works with guards and providers to support various authentication methods. Auth class create & destroy session manually if authenticated user login & logout. 
  Key Components:
    - Guards: Define how users are authenticated (e.g., session-based, token-based).
    - Providers: Determine how users are retrieved from storage (e.g., Eloquent, database).

**How it works**

## Authentication:

User submits credentials (username/email, password).
Auth::attempt() method validates credentials against user data.   
On successful authentication, a session is created (for session-based auth) or a token is generated (for token-based auth).

## Authorization:

Auth::check() method verifies if a user is authenticated.   
Auth::user() retrieves the authenticated user's information.   
Middleware and gates can be used to control access to routes and resources based on user roles or permissions.   
Common Methods:

Auth::attempt(): Attempts to log a user in.
Auth::check(): Checks if a user is logged in.
Auth::user(): Retrieves the authenticated user.
Auth::login(): Manually log a user in.
Auth::logout(): Logs the user out.



<!-- ************************************************************ -->


## Starter Kit :-
Laravel provides starter kits like Breeze ,Fortify and Jetstream that offer robust authentication scaffolding.
These starter kits provides some built In Registration /Login Page , Forgot Password , Email Verification , Two-factor Authentication.


<!-- ************************************************************ -->


## API Authentication :- 

Laravel offers several robust methods for securing your APIs. The choice of method depends on the complexity of your application and the level of security required.
- 1. Basic Token-Based Authentication
- 2. Laravel Sanctum
- 3. Laravel Passport

    **[1. Basic Token-Based Authentication]()**
        Simple and efficient: Suitable for basic API authentication.   
        Involves:
        Generating a random token for each user.   
        Storing the token in the database.   
        Including the token in API requests.   
        Verifying the token on the server-side.   

    **[2. Laravel Sanctum]()**
        Ideal for SPAs, mobile apps, and simple token-based APIs.   
        Key features:
        Generates multiple API tokens per user.   
        Supports token scopes for granular permissions.   
        Offers CSRF protection for cookie-based authentication.   
        Can be used with or without sessions.

    **[3. Laravel Passport]()**
        Full-featured OAuth2 server implementation.   
        Best for complex authentication scenarios with multiple clients.
        Supports:
        Client credentials grant.   
        Password grant.
        Authorization code grant.   
        Implicit grant.   
        Refresh tokens.

    ## Key Considerations
        Token storage: Decide where to store tokens (database, file, or cache).
        Token expiration: Implement token expiration for security.
        Token validation: Validate tokens on each request to prevent unauthorized access.
        Token revocation: Provide a mechanism to revoke tokens when necessary.
        API rate limiting: Implement rate limiting to protect your API from abuse.

## How to Implement Auth Class ?
