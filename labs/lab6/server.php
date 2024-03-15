<?php

require './ca.php';
require './lib/debug.php';

$privateKey = '-----BEGIN PRIVATE KEY-----
MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCMOowywKSuy6F8
0e68pVxdcdt8se0Whwm5UXed/chJYTpXOvTcdaj5pKQV4ilSxz3lbxg+31wnivZs
peqR3Su/s+C0EmLl5OMXmcEVmBdrSQp+kb9fC/WgqT8hOU9r5Qwm+zj4FsrU4aiI
5mEwz3QtX7xbSan74U4WsWtEA/zqqKxrGKPPTmNoDqFxFSkulXxjaeR/qU0Dls23
V/KVfeX2OE2pH95esLlpkd25qEZ6LXsi1RUlaP78IZSpdijGpdDjBkXvTvGoMqCt
vr6hXV/z1MAAaXLBKYMInWw1HRPJ4ESBbuHwY8b0NSBxO7X0ri3HHpKmGu5SZRYD
QPI0WgMtAgMBAAECggEAExcdYwNq6Aj80RtbXv88FdScRtuKJVj47+uxVybnj2XX
JWz3TNQPzvylAf2qFoTdXlDDgjuyNgfrCFuGFZmAjTaVzq36HMYOTHY4HRJ5jbeB
4D1DSlM8e0TPPVyp/UxPXTcySEQCFP0rjoeej6COdmbkI6FhrNK9aMV6juXkFqXw
RijJoAckI19loZqDh2weWGza9io/p1AmRs8FWBCkjIFXPjJ0B5d06IyQRq0SYPku
FsyZLauSay2ftVtfP/wqXDYWAk3IZegBNMu8LdhJH8Hct2Zr1k4bE4yZirCvUFa/
ml9hRGsXYUMDZgSaR910ZyQzZS0ua8a6oK3eR1ec2QKBgQC3rdeZby9ctU5qRuEO
ZJ8/ZPuWKk9qyq1wc73Mie2p7A+65qUuXAQn3YqXbcWQxn3BQKX5YGMdA9rPuhxu
1UOvGyOeYnNDrPQSiCaSTM6iQ+jhMTY8p/PqwXA3z3x7F/OKg9jA9KZv7a796hW+
J9JuezToyC9n8NKo81IpmAUiowKBgQDDcRJy95lPvHZjUtQuA9/r8utPkQ4ySedP
aBAD++W478OUqqw0kkTqJrMQuDEvEo78R644ObmdJGe9rRiEpkgRlkp1ulBiEX+o
Hq5aicx19AKyTH+6o8x7Ir7ghMgT/RlROoCejNvuvpuUENFfQRK3MB7YXhq1PPvj
7RXHXu5v7wKBgQCstCtVHGLnA56wdOaltty5KcUY4716hwlfA6TBTisGK2x66uUD
WweZSEhIq7EouEmDzLqCaSuoG3jA+phDagjS+2yZPq5sQpHXXucNhmR/0+SC4NfD
XpQM9kcCYvgDcXjPk7rZau+XrF9uZYx+GElXEkekXJ2eWKRqsSZe745ciwKBgBep
1iEDZ5Wm7PKjsbsMjw0jcWhF2OEv34jWwbGpyyu0JAsZCxamax+qpd2tX48igRt8
llSKcLXdFY56qdBNzcYLW2Kbt2XYVouFg3jE3HOfor/x0TlI4dY647+NdCgvaeRS
4AXSakKi43Vu/9q3p0t00RdDdZpiEuGK8CsejGITAoGASn41HcGtAVD+UT7YYKOg
puPedHiM8zsazRY7/EHyvDjiSuyyJyoC/tUsS24CbgxY24JrMmhfPufXRcdLVAp7
of8xRXg8qkbyQDTavs1D+ripXzPkW7BM1kZolkNzfqUFgkwKzm4D0fgYKITl9RFi
gXDVOMiTscTiSLW/KaHWUTg=
-----END PRIVATE KEY-----';

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


// Use socket_bind to bind the socket to port 4443 - if the binding fails, print a message to the user and exit()
//
if (!socket_bind($socket, "localhost", 4443)) {
    echo "Port unavailable";
    exit();
}
// Call socket_listen to start listening for client connections
//
socket_listen($socket);


echo "Server listening on port 4443\n";

// Call socket_accept to accept an incoming connection, and store the returned value in a variable named $client
//
$client = socket_accept($socket);

echo "Client connected\n";

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
        - Read 64 bytes, the "Client Random"
*/
//
$clientRandom = socket_read($socket, 64);


/* 
    STEP 2a:
        - Generate 32 random bytes and convert to hex (using bin2hex()), store the value in a variable named $serverRandom
        - Write $serverRandom to the socket, e.g.: 
            socket_write($client, $serverRandom, strlen($serverRandom))
*/
//
// Generate 32 random bytes for the Server Random
$serverRandom = openssl_random_pseudo_bytes(32);

// Convert the Server Random to hexadecimal representation
$serverRandomHex = bin2hex($serverRandom);

// Write the Server Random to the socket
socket_write($client, $serverRandomHex, strlen($serverRandomHex));

/*
    STEP 2b:
        - Create a new instance of the CertificateAuthority class (see ca.php)
        - Hash the server's public key using the hash() method with sha256 algorithm
        - Call the getSSLCertificate() method of the CertificateAuthority, passing in the hashed public key
        - Write the returned certificate to the socket
*/
//
// Create an instance of the CertificateAuthority class
$certificateAuthority = new CertificateAuthority();

// Hash the server's public key using the SHA256 algorithm
$hashedPublicKey = hash('sha256', $publicKey);

// Call the getSSLCertificate() method of the CertificateAuthority
$serverCertificate = $certificateAuthority->getSSLCertificate($hashedPublicKey);

// Write the returned certificate to the socket
socket_write($client, $serverCertificate, strlen($serverCertificate));

/*
    STEP 3:
        - Read 304 bytes, the "Pre-Master Secret"
*/
//
// Read 304 bytes from the socket for the Pre-Master Secret
$encryptedPreMasterSecret = socket_read($socket, 304);



/*
    STEP 4:
        - Decrypt the Pre-Master Secret using openssl_private_decrypt()
*/
//
$isDecrypted = openssl_private_decrypt($encryptedPreMasterSecret, $preMasterSecret, $privateKey);


/*
    STEP 5: 
        - Use the hash() function with sha256 algorithm to hash the concatenated Pre-Master Secret, Client Random, and Server Random
        - Store this hashed value in a variable named $masterSecret
        - Write the string READY to the socket to indicate to the client that the server is ready to accept messages
*/
//
// Concatenate Pre-Master Secret, Client Random, and Server Random
$concatenatedData = $preMasterSecret . $clientRandom . $serverRandom;

// Hash the concatenated data using SHA256 algorithm
$masterSecret = hash('sha256', $concatenatedData);

// Write the string "READY" to the socket
socket_write($socket, "READY", strlen("READY"));

/*
    STEP 6:
        - Begin receiving messages from the client
*/
$algo = 'aes-256-cbc'; // encryption algorithm
$iv = '0f898e31ec73e4f5'; // initialization vector

while (true) {
    echo "Server waiting for data\n";

    /* 
        Before sending data, the client must indicate how many bytes it will send
            e.g. the client will send the message LEN=0011 (for the text "Hello World") 
            
            Note that length value should always be 4 digits

        Use socket_read() to get the LEN message, then use socket_write to send an acknowledgment message
            e.g. ACK=0011

        NOTE: socket_write() returns the number of bytes that were written - if the number of bytes written is zero (i.e. nothing was sent) - close the socket and exit()
    */
    //
    // Use socket_read() to get the LEN message from the server
$lenMessage = socket_read($socket, 8);

// Extract the length value from the received message
$receivedLength = substr($lenMessage, 4);

$ackMessage = "ACK=0064" . $receivedLength;
$bytesWritten = socket_write($socket, $ackMessage, strlen($ackMessage));

    
    /*
        Next, use socket_read to read n bytes, where n is the previously received LEN (length) value
        
        Convert the received bytes to binary using hex2bin()
    */
    //
    // Convert the received length to an integer
$receivedLength = (int)$receivedLength;

// Use socket_read() to read n bytes from the socket, where n is the previously received LEN (length) value
$encryptedDataHex = socket_read($socket, $receivedLength);

// Convert the received bytes to binary using hex2bin()
$encryptedData = hex2bin($encryptedDataHex);

    /*
        Finally, use openssl_decrypt on the converted bytes, using the $algo, $masterSecret, and $iv variables as arguments
        
        Echo the unencrypted message
    */
    //
    // Finally, use openssl_decrypt on the converted bytes, using the $algo, $masterSecret, and $iv variables as arguments
$decryptedData = openssl_decrypt($encryptedData, $algo, $masterSecret, 0, hex2bin($iv));

// Echo the unencrypted message
echo "Received message from the server: $decryptedData\n";

}

?>