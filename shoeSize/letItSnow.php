<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once 'functions/connection.php';
?>

<html>
    <head>
        <title>Let It Snow! Let It Snow! Let It Snow!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../snow.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="../snow.js"></script>
    </head>
    <body>
        <div id="snowflakeContainer">
            <span class="snowflake"></span>
        </div>
        <div id="main">
            <iframe src="../audio/Let It Snow - Dean Martin.mp3" allow="autoplay" style="display:none" id="iframeAudio">
            </iframe>
            <audio loop="true" autoplay controls>
                <source style="display:none" src="../audio/Let It Snow - Dean Martin.mp3">
            </audio>
            <h1>Let it snow!</h1>
            <p>Oh the weather outside is frightful<br>
                But the fire is so delightful<br>
                And since we've no place to go<br>
                Let It Snow! Let It Snow! Let It Snow!<br>
                It doesn't show signs of stopping<br>
                And I've brought some corn for popping<br>
                The lights are turned way down low<br>
                Let It Snow! Let It Snow! Let It Snow!<br>
                When we finally kiss good night<br>
                How I'll hate going out in the storm!<br>
                But if you'll really hold me tight<br>
                All the way home I'll be warm<br>
                The fire is slowly dying<br>
                And, my dear, we're still goodbying<br>
                But as long as you love me so<br>
                Let It Snow! Let It Snow! Let It Snow!<br>
                The weather outside is frightful<br>
                But that fire is, mmm, delightful<br>
                And since we've no place to go<br>
                Let it snow! Let it snow, Let it snow!<br>
                It doesn't show signs of stopping<br>
                And I've brought lots of corn for popping.<br>
                The lights are way down low<br>
                So, Let It Snow! Let It Snow! Let It Snow!<br>
                When we finally say goodnight<br>
                How I'll hate going out in the storm!<br>
                But, if you'll only hold me tight<br>
                All the way home I'll be warm!<br>
                The fire is slowly dying<br>
                And, my dear, we're still goodbying<br>
                But as long as you love me so<br>
                Let It Snow! Let It Snow! Let It Snow!</p>
        </div>
    </body>
</html>