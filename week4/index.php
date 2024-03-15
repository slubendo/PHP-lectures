<?php

/*
    Docker

    Images - template/set of instructions for creating containers
        typically created from a Dockerfile

        e.g. dockerfile

        FROM ubuntu:latest

        RUN apt-get update
        RUN apt-get install apache
        RUN ...
        RUN ...

    Images are made up of 'layers' - a layer is just a diff of the changes made between instructions in the Dockerfile

    Layers are cached - if we wanted to add a new layer to an existing layer, we don't need to rebuild from scratch, we can use the previously cached layers

        - every layer is a valid image

    
    docker image ls
    docker image rm <image>

    <project>/vendor/laravel/sail/runtimes/8.0/Dockerfile


    Containers
    ----------

    docker run -d --name mycontainer testimage

    docker ps
        list running containers

    docker ps -a
        list all containers (running and stopped)

    docker start containerid
    docker stop containerid

    docker exec (run commands inside of containers)
    docker exec -it <laravel> /bin/bash
*/

/*
    include()
    require()
    include and require are both used to import other php code into a file - include() produces a warning when a file cannot be found, require() causes a fatal error

    include_once()
    require_once()
*/

/*
    Lab 2 extended due date is Thursday February 8th
    Lab 3 due the following Monday
*/

/*
    Cookies - files that are stored in the browser (client-side) that can contain (string) information about preferences, shopping cart items, etc.

    Cookies can be viewed/deleted in the developer tools under the network (chrome)

    Cookies are created on the server and sent to the browser

    After receiving the cookie, the browser sends it along with future requests and the server reads the information

    Cookies are only valid for a particular domain

    Cookies have an (optional) expiry date - if no expiry date is set, they are destroyed when the window is closed
*/

// create a cookie
// $cookie_name = 'loggedIn';
// $cookie_value = 'TESTING';
// $expiry = time() + 60; // current time + 60 seconds
// $path = '/';
// setcookie($cookie_name, $cookie_value, $expiry, $path);  // access it via $_COOKIE["loggedIn"]

// echo $_COOKIE["loggedIn"] ?? "No cookie value found";

/*
    Deleting a cookie:
    call setcookie() with an expiry date in the past
    and unset any $_COOKIE values
*/
// setcookie('loggedIn', '', time() - 1, "/");
// unset($_COOKIE["loggedIn"]);


/*
    Sessions

    Sessions are like cookies, but stored server-side

    Sessions are created automatically when the browsers interacts with the server for the first time, the server will create a session for the client and send back a 'session id'

    Sessions are kept alive by requests from the client (that include the session cookie), or if the browser stops sending requests the session will timeout

    If you close your browser/window, the session cookie is destroyed, meaning that further requests to the same server would require a new session to be created

    Note: sessions are not unique to a window/tab
*/

// IMPORTANT - any session related code in PHP *has* to start with a call to session_start()

session_start();

$_SESSION["day"] = "Monday";

/*
    Stop a session and unset all session variables
    session_unset()
    session_destroy()
*/
// session_unset();
// session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('header.php'); ?>
    <main>
       <?php //echo "<h1>Week 4: Includes/Requires, Cookies and Sessions</h1>"; ?>
       <h1><?php echo $_SESSION["day"] ?? "No session variable set"; ?></h1>
    </main>
</body>
</html>