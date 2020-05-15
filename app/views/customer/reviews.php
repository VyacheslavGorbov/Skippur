<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
        textarea.html-text-box {
            background-color: #ffffff;
            background-image: url(http://);
            background-repeat: no-repeat;
            background-attachment: fixed;
            border-width: 1;
            border-style: solid;
            border-color: #cccccc;
            font-family: Arial;
            font-size: 14pt;
            color: #000000;
        }

        input.html-text-box {
            background-color: #ffffff;
            font-family: Arial;
            font-size: 14pt;
            color: #000000;
        }
    </style>
    <title>Reviews</title>
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
    <h2 class="text-center"><?php echo $data['site']->site_name ?> Reviews</h1>
        <br>
        <ul class="list-group" id="comment-section" style="width: 750px; height: 300px; overflow: auto; margin: 0 auto;">
            <?php

            if (!empty($data["reviews"]))
                foreach ($data["reviews"] as $review) {
                    echo "<li class='list-group-item'><strong>Review Rating: </strong>" . $review->review_rating . "<br>";
                    echo "<strong>Review Message: </strong>" . $review->review_message . "</li>";
                }
            ?>
        </ul>
        <br>
        <form method="post" action="/customer/addReview" class="text-center">
            <label for="star-rating">Rating: </label>
            <select id="star-rating" name="rating">
                <option value="5">(5) Excellent</option>
                <option value="4">(4) Very Good</option>
                <option value="3">(3) Average</option>
                <option value="2">(2) Below Average</option>
                <option value="1">(1) Bad</option>
            </select>
            <br>
            <textarea name="comment" cols="30" rows="5" class="html-text-box" placeholder="Comments here ..."></textarea><br>
            <input type="hidden" value=<?php echo $data['customer']->customer_id ?> name="customer_id">
            <input type="hidden" value=<?php echo $data['site']->site_id ?> name="site_id">
            <input type="submit" value="Submit" name="review-submit" class="html-text-box">
            <input type="reset" value="Reset" class="html-text-box">
        </form>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>