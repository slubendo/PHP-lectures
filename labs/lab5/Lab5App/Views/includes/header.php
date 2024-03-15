<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: sans-serif;
        }
        table {
            border-collapse: collapse;
        }
        th {
            color: navy;
            text-transform: uppercase;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        tr:nth-child(2n) {
            background-color: rgb(200 200 255 / 0.5);
        }
    </style>
</head>
<body>
    <header>
        <h1>COMP 4515 Lab 5</h1>
    </header>
    <main>
        <h2>Student List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>