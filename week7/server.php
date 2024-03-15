<?php 

// Sockets

// create a socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

// bind the socket to a port
if (!socket_bind($socket, "localhost", 4443)) {
    echo "Port unavailable";
    exit();
}

// socket_connect

socket_listen($socket);
$client = socket_accept($socket);


socket_write($client,"data", strlen($client));
socket_read($client,64);

while(true) {
    $data = readline("Enter your message: ");
    $bytesWritten = socket_write($socket, $data, 0);

}  






?>