<?php

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_connect($socket, 'localhost', 4443);

socket_write($socket, $clientRandomHex, strlen($clientRandomHex));

while(true) {
    $data = readline("Enter your message: ");
    $bytesWritten = socket_write($socket, $data, 0);

}