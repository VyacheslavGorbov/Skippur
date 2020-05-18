<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="https://kit.fontawesome.com/bdd89edb33.js"></script>
    <link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
      rel="stylesheet"
    />

    
  
    <style>
                    * {
            box-sizing: border-box;
          }

          /* Set a background color */
          body {
            background-color: #474e5d;
            font-family: Helvetica, sans-serif;
          }

          /* The actual timeline (the vertical ruler) */
          .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
          }

          /* The actual timeline (the vertical ruler) */
          .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: white;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
          }

          /* Container around content */
          .container {
            padding: 10px 40px;
            position: relative;
            background-color: inherit;
            width: 50%;
          }

          /* The circles on the timeline */
          .container::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            right: -17px;
            background-color: white;
            border: 4px solid #FF9F55;
            top: 15px;
            border-radius: 50%;
            z-index: 1;
          }

          /* Place the container to the left */
          .left {
            left: 0;
          }

          /* Place the container to the right */
          .right {
            left: 50%;
          }

          /* Add arrows to the left container (pointing right) */
          .left::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            right: 30px;
            border: medium solid white;
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent white;
          }

          /* Add arrows to the right container (pointing left) */
          .right::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            left: 30px;
            border: medium solid white;
            border-width: 10px 10px 10px 0;
            border-color: transparent white transparent transparent;
          }

          /* Fix the circle for containers on the right side */
          .right::after {
            left: -16px;
          }

          /* The actual content */
          .content {
            padding: 20px 30px;
            background-color: white;
            position: relative;
            border-radius: 6px;
          }

          /* Media queries - Responsive timeline on screens less than 600px wide */
          @media screen and (max-width: 600px) {
          /* Place the timelime to the left */
            .timeline::after {
              left: 31px;
            }

          /* Full-width containers */
            .container {
              width: 100%;
              padding-left: 70px;
              padding-right: 25px;
            }

          /* Make sure that all arrows are pointing leftwards */
            .container::before {
              left: 60px;
              border: medium solid white;
              border-width: 10px 10px 10px 0;
              border-color: transparent white transparent transparent;
            }

          /* Make sure all circles are at the same spot */
            .left::after, .right::after {
              left: 15px;
            }

          /* Make all right containers behave like the left ones */
            .right {
              left: 0%;
            }


          }

          


    </style>
    <link rel="stylesheet" href="css/style.css" />
    <title>Flipping Cards</title>
  </head>
  <body>
   
          <div class="timeline">
            <?php foreach(array_chunk($data['schedule'] , 2) as $val) {  ?>
              
              
                <div class="container left">
                  <div class="content">
                    <h2><?php echo date("g:i A", strtotime($val[0]->start_time)) . ' - ' . date("g:i A", strtotime($val[0]->end_time)) ?></h2>
                    <p><b>Service(s):</b><?php echo $val[0]->service ?></p>
                    <p><b>Message: </b><?php echo $val[0]->message ?> </p>
                  </div>
                </div>
                <?php if(array_key_exists(1, $val)) { ?>
                <div class="container right">
                  <div class="content">
                    <h2><?php echo date("g:i A", strtotime($val[1]->start_time)) . ' - ' . date("g:i A", strtotime($val[1]->end_time)) ?></h2>
                    <p><b>Service(s):</b><?php echo $val[1]->service ?></p>
                    <p><b>Message: </b><?php echo $val[1]->message ?> </p>
                  </div>
                </div>
                <?php } ?>
                <?php } ?>
            </div>
  </body>
</html>