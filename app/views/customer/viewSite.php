<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title><?php echo $data['site']->site_name ?></title>
</head>



<body>
    <div class='row'>
        <div class='col-md-6'>
            <h1><center><?php echo $data['site']->site_name ?></center></h1>
            </br>
            <button type='button' class='btn btn-primary' onclick="location.href = '/customer/index';">Back</button>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    echo $data['calendar'];
                    ?>
                </div>
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

                        <h4><b>Booking Date: </b> <?php echo $data["date"]?></h4>

                        
                        <h4 ><b>Booking For:</b>  <span id="slot"><span></h4>
                        <h4 ><b>Service(s): </b><?php echo $data["services"]?><span></h4>
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