<?php

session_start();
include("connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced ChatGPT UI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">NEXA</div>
        <ul class="navbar-menu">
            <li><a href="signin.php" class="signin">Login</a></li>
        </ul>
        <p>Hello <?php
        if(isset($_SESSION["email"])){
            $email = $_SESSION["email"];
            $query= mysqli_query($conn,"SELECT users. * FROM 'users' where users.email='$email'");
            while($row=mysqli_fetch_array($query)){
                echo $row["firstName"]."".$row["lastName"];
            }
        }
        
        ?>   
    </p>
    </nav>
    <div class="container">
        <aside class="sidebar" id="sidebar">
            <div class="collapse-button" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#profile"><i class="fas fa-user"></i> <span>Profile</span></a></li>
                <li><a href="#new" onclick="startNewChat()"><i class="fas fa-plus"></i> <span>New Chat</span></a></li>
                <li><a href="#recent" onclick="openRecentChats()"><i class="fas fa-comments"></i> <span>Recent Chats</span></a></li>
                <li class="bottom-item"><a href="#history" onclick="openHistory()"><i class="fas fa-history"></i> <span>History</span></a></li>
                <li class="bottom-item"><a href="#settings" onclick="openSettings()"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
                <li class="bottom-item"><a href="logout.php"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
            </ul>
        </aside>
        <main class="main-section">
            <div class="chat-window" id="chat-window">
                <div class="message bot-message">
                    <p>Welcome to ChatGPT! How can I help you today?</p>
                </div>
            </div>
            <div class="input-container">
                <input type="text" id="user-input" placeholder="Type your message here...">
                <button onclick="sendMessage()"><i class="fas fa-paper-plane"></i></button>
            </div>
        </main>
    </div>
    <footer class="footer">
        <p>&copy; 2024 NEXA.AI All rights reserved.</p>
    </footer>
    <script src="script.js"></script>
   
    
</body>
</html>
