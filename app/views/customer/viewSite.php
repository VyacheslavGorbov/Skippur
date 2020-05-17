<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title site="<?php echo $data['site']->site_id;?>"  name="title"><?php echo $data['site']->site_name ?></title>
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