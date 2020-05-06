<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <h1>Profile Page</h1>
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
    <nav>
        <a href="/customer/profile">Profile</a> |
        <a href="/customer/messages">Messages</a> |
        <a href="/customer/appointments">My Appointments</a>
    </nav>

    <form action='' method='post' onsubmit="return false">
        <input id='referral' type='text' name='name' readonly />
        <button onclick="generateReferral()" type='submit' name='referralSubmission'>Generate Referral Code</button>
    </form>


</body>

</html>