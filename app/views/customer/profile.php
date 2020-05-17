<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <title>My Profile</title>
    <style>
        body {
            background: rgb(80, 117, 160);
            background: linear-gradient(167deg, rgba(80, 117, 160, 1) 0%, rgba(104, 255, 200, 1) 100%);
            text-align: center;
        }

        h2,
        h3 {
            text-align: center;
            color: #092024;
        }

        nav {
            text-align: center;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }

        .title {
            color: grey;
            font-size: 18px;
        }


    </style>
    <script>
        function generateReferral() {
            //example : AB!42%A%2AB
            var charsets = {
                '0': 'ABCDEFGHIKLMNOPQRSTUVWXYZ',
                '1': '0123456789',
                '2': '@$%*!#='
            };
            var pattern = '00211212100'
            var code = '';

            for (var i = 0; i < pattern.length; i++) {
                code += charsets[pattern.charAt(i)].charAt(Math.random() * Math.floor(charsets[pattern.charAt(i)].length));
            }

            document.getElementById('referral').value = code;
        }
    </script>
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
    <br>
    <h2 class="text-center">My Profile Card</h2>
    <div class="card">
        <img src="/images/download.jpg" style="width:100%">
        <h1><?php echo $data['customer']->customer_name?></h1>
        <p class="title"><?php echo $data['customer']->customer_email?></p>
        <div style="margin: 24px 0;">
        </div>
    </div>
    <br>
    <h2 class="text-center">My Referrals</h2>
    <br>
    <div id="errorMsg"></div>
    <?php

    if (!empty($data['referrals'])) {
        echo '<span class="border border-primary rounded" style="font-size: 25px; background-color:white;">' . $data['referrals']->referral_code . '</span><br>';
        echo '<span style="font-size: 20px">You have ' . $data['referrals']->referral_uses . ' referral uses remaining.</span>';
    } else {
        echo '<span class="border border-primary rounded" style="font-size: 25px; background-color:white;">###########</span>';
    }

    ?>
    <form action='/customer/createCode' method='post'>
        <input id='referral' type='hidden' name='referral_code' readonly />
        <input name='customer_id' type='hidden' value=<?php echo $data['customer']->customer_id ?>>
        <button onclick="generateReferral()" type='submit' name='referralSubmission' class='btn btn-primary'>Generate Referral Code</button>
    </form>


</body>

</html>