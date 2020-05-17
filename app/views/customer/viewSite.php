<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title><?php echo $data['site']->site_name ?></title>
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

    <table class="table">
        <thead>
            <tr>
                <th scope="col"><a href="/customer/sendMessage/<?php echo $data['site']->site_id ?>">Send Message</a></th>
                <th scope="col"><a href="/customer/reviews/<?php echo $data['site']->site_id ?>">Reviews</a></th>
                <th scope="col"><a href="/customer/videos/<?php echo $data['site']->site_id ?>">Videos</a></th>
            </tr>
        </thead>
    </table>
    <h1 class='text-center'><?php echo $data['site']->site_name ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                echo $data['calendar'];
                ?>
            </div>
        </div>
    </div>



    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2> Please confirm your booking details<h2>

                            <h4><b>Booking Date: </b> <?php echo $data["date"] ?></h4>


                            <h4><b>Booking For:</b> <span id="slot"><span></h4>
                            <h4><b>Service(s): </b><?php echo $data["services"] ?><span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <form action="/site/set_booking" method="post">
                                <div class="form-group">
                                    <label for="appt">Confirm</label>
                                    <p><input type="checkbox" required name="terms"> I accept the <u>Terms and Conditions</u></p>
                                    <!--<small>Office hours are 9am to 6pm</small> -->
                                </div>

                                <textarea rows="4" cols="50" placeholder="Enter some details about the service(s) you want"> </textarea>

                                <input type="hidden" name="date" id="today">

                                <div class="modal-footer">
                                    <div class="form-group pull-right">
                                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>

                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->

            </div>

        </div>
    </div>
    </div>
</body>

</html>