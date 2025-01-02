<?php
session_start();
?>

<?php
include 'db.php'; ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        /* Header */
        .header {
            background:  #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
        }
        
        /* Sidebar Navigation */
        .dashboard-nav {
            width: 205px;
            background: #333;
            color: #fff;
            height: 100vh;
            position: fixed;
            top: 98px;
            left: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .dashboard-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .dashboard-nav ul li {
            margin: 0;
        }

        .dashboard-nav ul li a {
            display: block;
            padding: 15px 20px;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .dashboard-nav ul li a:hover {
            background-color: #575757;
        }


        /* Main Content */
        .dashboard-main {
            margin-left: 250px; /* Space for the fixed sidebar */
            padding: 20px;
            flex: 1;
        }

        .dashboard-main section {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .dashboard-main section h2 {
            margin-top: 0;
        }
        h2.a{
            textdecoration:none;
        }

        /* myadoption.php css */
        .Adoption_container {
            width: 90%;
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table th, table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #00bd56;
            color: #fff;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
    </style>
    </head>
    <div class="header" style="background-color: #4CAF50;">
    <h1>User Management Dashboard</h1>
</div>
<!-- <div class="dashboard-container">
    <header class="dashboard-header">
        <h1>Welcome, <?php echo $users['username']; ?>!</h1>
    </header> -->