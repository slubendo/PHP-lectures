<?php

require './ca.php';
require './lib/debug.php';

$publicKey = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAjDqMMsCkrsuhfNHuvKVc
XXHbfLHtFocJuVF3nf3ISWE6Vzr03HWo+aSkFeIpUsc95W8YPt9cJ4r2bKXqkd0r
v7PgtBJi5eTjF5nBFZgXa0kKfpG/Xwv1oKk/ITlPa+UMJvs4+BbK1OGoiOZhMM90
LV+8W0mp++FOFrFrRAP86qisaxijz05jaA6hcRUpLpV8Y2nkf6lNA5bNt1fylX3l
9jhNqR/eXrC5aZHduahGei17ItUVJWj+/CGUqXYoxqXQ4wZF707xqDKgrb6+oV1f
89TAAGlywSmDCJ1sNR0TyeBEgW7h8GPG9DUgcTu19K4txx6SphruUmUWA0DyNFoD
LQIDAQAB
-----END PUBLIC KEY-----';

// Call socket_create using the options AF_INET, SOCK_STREAM, SOL_TCP and store the socket instance in a variable named $socket
//
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_connect($socket, 'localhost', 4443);
// Use socket_connect to connect to the socket on port 4443 - if connect fails, print a message to the user and exit()
//

echo "Connected to server on port 4443\n";


/*
    (Simplified) TLS handshake

    Step 1:
        - Client initiates handshake by sending a 32 byte random number, "Client Random"

    Step 2:
        - Server responds with 32 byte random number, "Server Random"
        - Server also sends its SSL certificate

    Step 3:
        - Client verifies the identity of the server using the SSL certificate 
        - Client generates and sends a 48 byte random number, "Pre-Master Secret", and encrypts it using the server's public key

    Step 4:
        - Server decrypts the "Pre-Master Secret" using its private key   
    
    Step 5:
        - Both Client and Server create the symmetric "Master" key by hashing the combined Pre-Master Secret, Client Random, and Server Random

    Step 6:
        - Assuming the keys match, the client begins sending *encrypted* messages using the Master key, and the server decrypts them using the Master key

*/

/*
    STEP 1:
        - Generate 32 random bytes, the "Client Random", convert to hex using bin2hex(), and store the result in a variable named $clientRandom 
        - Write $clientRandom to the socket, e.g.:
            socket_write($socket, $clientRandom, strlen($clientRandom)); 

*/
//

// Generate 32 random bytes for the Client Random
$clientRandom = openssl_random_pseudo_bytes(32);
// Convert the Client Random to hexadecimal representation
$clientRandomHex = bin2hex($clientRandom);

// Write the Client Random to the socket
socket_write($socket, $clientRandomHex, strlen($clientRandomHex));

/*
    STEP 2:
        - Read 64 bytes from the socket and store the value in a variable named $serverRandom
        - Next, read 108 bytes from the socket and store the value in a variable named $serverCertificate
*/
//
// Read 64 bytes from the socket for the server's random value
$serverRandom = socket_read($socket, 64);

// Read 108 bytes from the socket for the server's certificate
$serverCertificate = socket_read($socket, 108);


/*
    STEP 3a:
        - Create an instance of the CertificateAuthority class, and call its validateCertificate() method, passing in 'server.php' as the first argument, and the $serverCertificate variable as the second argument
        - If validateCertificate() returns false, echo a message to the user, close the socket and exit()
*/
//
// Create an instance of the CertificateAuthority class
$certificateAuthority = new CertificateAuthority();

// Call the validateCertificate() method with 'server.php' as the first argument and $serverCertificate as the second argument
$isCertificateValid = $certificateAuthority->validateCertificate('server.php', $serverCertificate);

// Check if the certificate is not valid
if (!$isCertificateValid) {
    echo "Server certificate validation failed. Closing the connection.\n";
    socket_close($socket); // Close the socket
    exit(); // Exit the script
}

/*
    STEP 3b:
        - Generate 48 random bytes, convert them to hex using bin2hex(), and store the value in a variable named $preMasterSecret
        - Encrypt the Pre-Master Secret using openssl_public_encrypt() with the server's public key ($publicKey)
        - Finally, write the encrypted Pre-Master Secret to the socket
*/
//
// Generate 48 random bytes for the Pre-Master Secret
$preMasterSecret = openssl_random_pseudo_bytes(48);

// Convert the Pre-Master Secret to hexadecimal representation
$preMasterSecretHex = bin2hex($preMasterSecret);

// Encrypt the Pre-Master Secret using openssl_public_encrypt() with the server's public key
openssl_public_encrypt($preMasterSecret, $encryptedPreMasterSecret, $publicKey);

// Write the encrypted Pre-Master Secret to the socket
socket_write($socket, $encryptedPreMasterSecret, strlen($encryptedPreMasterSecret));


/*
    STEP 5: (note that step 4 only happens server-side)
        - Use the hash() function with sha256 algorithm to hash the concatenated Pre-Master Secret, Client Random, and Server Random
        - Store this hashed value in a variable named $masterSecret
        - Read 5 bytes from the socket - if the value is not "READY", close the socket and exit()
*/
//

// Concatenate Pre-Master Secret, Client Random, and Server Random
$concatenatedData = $preMasterSecret . $clientRandom . $serverRandom;

// Hash the concatenated data using SHA256 algorithm
$masterSecret = hash('sha256', $concatenatedData);

// Read 5 bytes from the socket
$readyMessage = socket_read($socket, 5);

// Check if the value read from the socket is "READY"
if ($readyMessage !== "READY") {
    echo "Server is not ready. Closing the connection.\n";
    socket_close($socket); // Close the socket
    exit(); // Exit the script
}


echo "Server is ready\n";

/*
    STEP 6:
        - Begin writing encrypted messages to the server
*/
$LEN = 0;
$algo = 'aes-256-cbc';
$iv = '0f898e31ec73e4f5'; // initialization vector, created using openssl_random_pseudo_bytes(openssl_cipher_iv_length($algo))

while (true) {
    /*
        Use readline() to capture a message from the user, and store the value in a variable named $data

        Use openssl_encrypt() to encrypt the message, using the $data, $algo, and $iv variables

        Convert the encrypted message to hex using bin2hex()

        Get the length of the encrypted hex message using strlen()
    */
    //
    // Use readline() to capture a message from the user, and store the value in a variable named $data
$data = readline("Enter your message: ");

// Encrypt the message using openssl_encrypt() with the $data, $algo, and $iv variables
$encryptedData = openssl_encrypt($data, $algo, $iv);

// Convert the encrypted message to hexadecimal using bin2hex()
$encryptedDataHex = bin2hex($encryptedData);

// Get the length of the encrypted hex message using strlen()
$encryptedDataLength = strlen($encryptedDataHex);

// Now you have the encrypted message in hexadecimal format and its length stored in $encryptedDataHex and $encryptedDataLength respectively

    
    /*
        Before sending the encrypted message, the client must indicate how many bytes it will send
        
        Using the length calculated above, send a message to the server of the form LEN=0064 (note that length value must always be 4 digits)

        NOTE: socket_write() returns the number of bytes that were written - if the number of bytes written is zero
                (i.e. nothing was sent) - close the socket and exit()
    */
    //
    // Before sending the encrypted message, the client must indicate how many bytes it will send
$lengthMessage = sprintf("LEN=0064", $encryptedDataLength);

// Using the length calculated above, send a message to the server of the form LEN=0064
$bytesWritten = socket_write($socket, "hello", strlen($lengthMessage));

// Check if the number of bytes written is zero
if ($bytesWritten === false || $bytesWritten === 0) {
    echo "Failed to write length message to the server. Closing the connection.\n";
    socket_close($socket);
    exit();
}

    
    /*
        Read the server's 8 byte acknowledgement message from the socket (e.g. ACK=0064)

        If the received ACK length is the same as the LEN transmitted previously, write the encrypted data to the socket
        Else, indicate to the user that the server did not respond, then close the socket and exit()

        As above, if the number of bytes of encrypted data written is zero, close the socket and exit()
    */
    //

    // Read the server's 8 byte acknowledgment message from the socket
$acknowledgment = socket_read($socket, 8);

// Extract the length value from the acknowledgment message
$receivedAckLength = substr($acknowledgment, 4);
if ($receivedAckLength == $encryptedDataLength) {
    // Write the encrypted data to the socket
    $bytesWritten = socket_write($socket, $encryptedDataHex, strlen($encryptedDataHex));
    
    // Check if the encrypted data was written successfully
    if ($bytesWritten === false || $bytesWritten === 0) {
        echo "Failed to write encrypted data to the server. Closing the connection.\n";
        socket_close($socket);
        exit();
    }
} else {
    // Indicate to the user that the server did not respond with the expected acknowledgment length
    echo "Server did not respond with the expected acknowledgment length. Closing the connection.\n";
    socket_close($socket);
    exit();
}
    
}

?>