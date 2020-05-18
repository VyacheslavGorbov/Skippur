<html>

<head>
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <style>
        table {
            table-layout: fixed;
        }

        td {
            width: 33%;
        }

        .today {
            background: yellow;
        }

        nav {
            text-align: center;
            background: rgb(80, 117, 160);
            background: linear-gradient(167deg, rgba(80, 117, 160, 1) 0%, rgba(104, 255, 200, 1) 100%);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="/home/index/">
            <img src="/images/skippur_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Skippur
        </a>
        <a href="/employee/add_employee">ADD NEW EMPLOYEE</a>
        <a href="/site/calender">HOME</a>
        <a href="/site/scheduleToday">SCHEDULE</a>
        <a href="/site/messages">MESSAGES</a>
        <a href='/home/logout' class="topcorner">LOGOUT</a>
    </nav>
    <br>
    <ul class="list-group" id="messages" style="width: 750px; height: 300px; overflow: auto; margin: 0 auto;">
        <?php
        if (!empty($data["messages"]))
            foreach ($data["messages"] as $message) {
                $sendertype = $this->model('User')->getUserById($message->sender_id)->user_type;
                echo var_dump($sendertype);
                
                if ($sendertype == 'Customer'){
                    $sender_name = $this->model('Customer')->getCustomerByUserId($message->sender_id)->customer_name;
                }
                else{
                    $sender_name = $this->model('Site')->getSite($message->sender_id)->site_name;
                }
                
                echo var_dump($sender_name);
                echo "<li class='list-group-item'><strong>" . $sender_name . ":</strong> ";
                echo $message->message;
                echo "<p style='color: #B8B8B8;text-align: right;'>" . $message->time_sent . "</p></li>";
            }
        ?>
    </ul>

    <form method="post" action="/site/sendMessage/<?php echo $data['customer']->customer_id?>" class="text-center">
        <br>
        <textarea id="myInput" name="message" cols="30" rows="5" class="html-text-box" placeholder="Message here ..."></textarea><br>
        <input type="hidden" value=<?php echo $data['customer']->customer_id ?> name="customer_id">
        <input type="hidden" value=<?php echo $data['site']->site_id ?> name="site_id">
        <input id="myBtn" type="submit" value="Submit" name="message-submit" class="html-text-box">
        <input type="reset" value="Reset" class="html-text-box">
    </form>
    
    <script>
        var input = document.getElementById("myInput");
        input.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById("myBtn").click();
            }
        });

        window.onload = function() {
            document.getElementById("myInput").focus();
        };
    </script>
</body>

</html>