<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="/customer/index/">
            <img src="/images/skippur_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Skippur
        </a>
        <a href="/customer/profile">Profile</a>
        <a href="/customer/messages">Messages</a>
        <a href="/customer/appointments">My Appointments</a>
        <a href='/home/logout'>Logout</a>
    </nav>
    <h2 class="text-center"><?php echo $data['site']->site_name ?> Messages</h2>
    <<a style="margin: 0 auto;" href="/customer/viewSite/<?php echo $data['site']->site_id?>">Back to site</a>
    <ul class="list-group" id="messages" style="width: 750px; height: 300px; overflow: auto; margin: 0 auto;">
        <?php
        if (!empty($data["messages"]))
            foreach ($data["messages"] as $message) {
                if ($message->sender_id == $data['customer']->user_id)
                    $sender = $data['customer']->customer_name;
                else
                    $sender = $data['site']->site_name;
                echo "<li class='list-group-item'><strong>" . $sender . ":</strong> ";
                echo $message->message;
                echo "<p style='color: #B8B8B8;text-align: right;'>" . $message->time_sent . "</p></li>";
            }
        ?>
    </ul>

    <form method="post" action="/customer/sendMessage/<?php echo $data['site']->site_id ?>" class="text-center">
        <br>
        <textarea id="myInput" name="message" cols="30" rows="5" class="html-text-box" placeholder="Message here ..."></textarea><br>
        <input type="hidden" value=<?php echo $data['customer']->customer_id ?> name="customer_id">
        <input type="hidden" value=<?php echo $data['site']->site_id ?> name="site_id">
        <input id="myBtn" type="submit" value="Submit" name="message-submit" class="html-text-box">
        <input type="reset" value="Reset" class="html-text-box">
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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