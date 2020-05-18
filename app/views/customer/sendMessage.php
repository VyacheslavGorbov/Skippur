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
                $sendertype = $this->model('User')->getUserById($message->sender_id)->user_type;
                
                if ($sendertype == 'Customer'){
                    $sender_name = $this->model('Customer')->getCustomerByUserId($message->sender_id)->customer_name;
                }
                else{
                    $sender_name = $this->model('Site')->getSite($message->sender_id)->site_name;
                }
                
                echo "<li class='list-group-item'><strong>" . $sender_name . ":</strong> ";
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