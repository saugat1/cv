<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reaction bot site</title>
    <link rel="stylesheet" href="style.css">
    <script src="jquery.js"></script>
    <script src="app.js"></script>
</head>
<body>
    <div class="header">
        <h1 class="head">Reaction Bot</h1>
    </div>
    <div class="main">
        <p> </p>
        <img src="girl.png" alt="girl png photo" title="girl png">
        <br>
        <div class="form-grp">
            <input type="text" name="token" id="token" placeholder="Your Access Token">
        </div>
        <div class="type">
            <select name="type" id="type">
                <option value="LOVE">LOVE</option>
                <option value="LIKE">LIKE</option>
                <option value="HAHA">HAHA</option>
                <option value="WOW">WOW</option>
                <option value="SAD">SAD</option>
                <option value="ANGRY">ANGRY</option>
            </select>
        </div>
        <div class="btn">
            <input type="submit" value="Submit" id="submit" name="submit">
        </div>
    </div>
    <div class="footer">
        Made By Nir Magar 2020
    </div>
</body>
</html>