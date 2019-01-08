<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>

<body>
    <div class="box reg container">
        <form id="form_sub">
            <p>Register</p>
            <input type="email" class="form-control" placeholder="Email Address">
            <input type="password" class="form-control" placeholder="Password">
            <input type="password" class="form-control" placeholder="Password">
            <input type="text" class="form-control" placeholder="First Name">
            <input type="text" class="form-control" placeholder="Last Name">
            <button class="btn" role="submit">Save</button>
            <span class="tooltip">Failed to register</span>
        </form>
    </div>
    <script>
        document.forms[0].addEventListener('submit', function (event) {
            event.preventDefault();
            let username = document.getElementsByTagName('input')[0].value.trim();
            let password1 = document.getElementsByTagName('input')[1].value;
            let password2 = document.getElementsByTagName('input')[2].value;
            let first_name = document.getElementsByTagName('input')[3].value.trim();
            let last_name = document.getElementsByTagName('input')[4].value.trim();
            let params = "username=" + username + "&password=" + password1 + "&first_name=" + first_name +
                "&last_name=" + last_name;

            if (!checkEmpty(username, password1, password2, first_name, last_name)) {
                error_call('Parameter field left empty');
                return false;
            } else if (!checkPassword(password1, password2)) {
                error_call('Passwords do not match!');
                return false;
            }

            let xhr = new XMLHttpRequest;
            xhr.open('POST', 'page/insert.php', true);
            xhr.onload = function () {
                if (this.responseText == "FAILED") {
                    error_call('Failed to create user');
                } else if (this.responseText == "EXISTS") {
                    error_call('Email account already exists!');
                } else if (this.responseText == "INSERTED") {
                    window.alert('Record saved succesfully');
                    window.location.replace('index.php');
                }
            }
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send(params);
        });

        function error_call(message) {
            document.getElementsByClassName('tooltip')[0].innerHTML = message;
            document.getElementsByClassName('tooltip')[0].classList.add('tooltip-show');
            setTimeout(() => {
                document.getElementsByClassName('tooltip')[0].classList.remove(
                    'tooltip-show');
            }, 2000);
        }

        function checkPassword(pass1, pass2) {
            if (pass1 === pass2) {
                return true;
            }
            return false;
        }

        function checkEmpty(...field) {
            for (i = 0; i < field.length; i++) {
                if (field[i] == "") {
                    return false;
                }
            }
            return true;
        }
    </script>
</body>

</html>