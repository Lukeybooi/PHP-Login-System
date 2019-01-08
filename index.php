<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body>
    <div class="box container">
        <form id="form_sub">
            <p>Sign In</p>
            <input type="email" class="form-control" placeholder="Email Address">
            <input type="password" class="form-control" placeholder="Password">
            <button class="btn" role="submit">Login</button>
            <span class="tooltip"></span>
            <div>
                <a href="forget.php">forgot your password?</a>
            </div>
        </form>
    </div>
    <div class="outside"><a href="register.php">Don't have an account? <b>Signup</b></a></div>
    <script>
        document.forms[0].addEventListener('submit', function (event) {
            event.preventDefault();
            let username = document.getElementsByTagName('input')[0].value.toLowerCase().trim();
            let password = document.getElementsByTagName('input')[1].value;
            let params = "username=" + username + "&password=" + password;

            if (username === "" || password === "") {
                error_call('Parameter field left empty');
            } else {
                let xhr = new XMLHttpRequest;
                xhr.open('POST', 'page/login.php', true);
                xhr.onload = function () {
                    if (this.responseText == "FAILED") {
                        error_call('Incorrect credentials');
                    } else if (this.responseText == "LOGGED") {
                        window.location.replace('home.php');
                    }
                }
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.send(params);
            }
        });

        function error_call(message) {
            document.getElementsByClassName('tooltip')[0].innerHTML = message;
            document.getElementsByClassName('tooltip')[0].classList.add('tooltip-show');
            setTimeout(() => {
                document.getElementsByClassName('tooltip')[0].classList.remove(
                    'tooltip-show');
            }, 2000);
        }
    </script>
</body>

</html>
