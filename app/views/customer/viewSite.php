<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title site="<?php echo $data['site']->site_id;?>"  name="title"><?php echo $data['site']->site_name ?></title>

    <style>
        nav {
            text-align: center;
            background: rgb(80,117,160);
            background: linear-gradient(167deg, rgba(80,117,160,1) 0%, rgba(104,255,200,1) 100%);
        }

        
    </style>
</head>



<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="/home/index/">
            <img src="/images/skippur_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Skippur
        </a>
        <a href="/customer/profile">Profile</a>
        <a href="/customer/messages">Messages</a>
        <a href="/customer/myAppointments">My Appointments</a>
        <a href='/home/logout' class="topcorner">Logout</a>
    </nav>
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
    


    <div id="serviceModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2> CHOOSE SERVICES<h2>

                      </div>
                      <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">

                               <?php foreach ($data['site_services'] as $service) {
                                    # code...
                                ?>
                                <input type="checkbox" name="<?php echo $service->service_id; ?>"  onclick= 'createAlerts(this)';value="<?php $service->service_name ?>">
                                <label for="<?php echo $service->service_name ?>"> <?php echo $service->service_name ?></label><br>

                                <?php } ?>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                             <div class="form-group pull-right">
                                 <button class="btn btn-primary" id="submit" data-dismiss="modal"> BOOK </button>
                             </div>
                         </div>
                      
                 </div>

            </div>
        </div>
    </div>


    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        var site_id = $('title').attr('site');
        var selectedServices = [];
        var selectedServicesString;
        var date;
        $(".book").click(function(){
            date = $(this).attr('date');
           $("#serviceModal").modal("show");
           

        })

        function createAlerts(theCheckbox){
            
            if(theCheckbox.checked){
                var serv = theCheckbox.name;
                selectedServices.push(serv);
               
            }else {
                var serv = theCheckbox.name;
                const index = selectedServices.indexOf(serv);
                if (index > -1) {
                    selectedServices.splice(index, 1);
                   
                }
            }
            
        }

        $('#submit').click(function(e) {
            $.each(selectedServices, function(index, value){
                if (index == 0)
                    selectedServicesString = value;
                else
                    selectedServicesString = selectedServicesString + ',' + value;
             })

            $('input[type=checkbox]').each(function(){ 
                this.checked = false; 
            });

            window.location = "/site/timeSlots/" + selectedServicesString + "/" + date + "/" + site_id;
        })

        


    </script>
</body>

</html>