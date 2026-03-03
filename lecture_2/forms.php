<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width: 400px;
            margin: auto;
            border: solid 1px black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <form action="worker.php" method="get">
        <input type="text" placeholder="name" id="name" name="saxeli">
        <br><br>
        <input type="text" placeholder="subject" id="subject" name="sagani">
        <br><br>
        <button>send information(get)</button>
        <!-- <button onclick="send_information()">send information</button> -->
    </form>
    
    <hr><hr>

    <form action="worker.php" method="post">
        <input type="text" placeholder="name" id="name" name="saxeli">
        <br><br>
        <input type="text" placeholder="subject" id="subject" name="sagani">
        <br><br>
        <button>send information(post)</button>
        <!-- <button onclick="send_information()">send information</button> -->
    </form>  
    


    <script>
        function send_information(){
            alert(document.getElementById("name").value + "სწავლობს "+document.getElementById("subject").value)
        }
    </script>
</body>
</html>