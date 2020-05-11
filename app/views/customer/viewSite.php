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
            <h1><?php echo $data['site']->site_name ?></h1>
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
    <div>
</body>

</html>