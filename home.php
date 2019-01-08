<?php
session_start();

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
} else {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    <section id="sect_1">
        <div class="dark">
            <div id="tab" class="container">
                <p><?php echo $name ?> <span> &emsp; | &emsp; I am your tag line</span></p>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Work</a></li>
                    <li><a href="">Team</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="page/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="dark">
            <div class="container">
                <ul class="short-hand">
                    <li><a href="">Home</a></li>
                    <li><a href="">Work</a></li>
                    <li><a href="">Team</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="page/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="hamburger-bar">
            <i class="fas fa-bars"></i>
        </div>

        <div id="panel">
            <p>Meet <b><?php echo $name ?>!</b></p>
            <p><span class="text-green">/Creative</span> one page template.</p>
            <p><sup class="text-green">______</sup> &emsp; We are a team of pressionals &emsp; <sup class="text-green">______</sup></p>
            <div>
                <i class="fab fa-twitter icon"></i>
                <i class="fab fa-facebook-f icon"></i>
                <i class="fab fa-google-plus-g icon"></i>
                <i class="fab fa-linkedin icon"></i>
            </div>
        </div>
    </section>
    <section id="sect_2">
        <div id="feature">Features</div>
        <div>
            <sup>_____________</sup>&emsp;<i class="far fa-heart"></i>&emsp;<sup>_____________</sup>
        </div>
        <div class="content">
            <div>
                <i class="fas fa-feather-alt icon_img"></i>
                <h1>Branding</h1>
                <p>This is some dummy text to display on this website to view how it turns out. This text will not be
                    used nor is it relevant. Articles are written to display how precise the writing is. Dummy text is
                    written just as a display in a certain section. Strangely enough the dummy text is not yet enough,
                    so more nonsense must be written down just to prove a point. Hopefully the font-size and
                    font-family is nice and modern and definitely precise.</p>
            </div>
            <div>
                <i class="fas fa-pencil-alt icon_img"></i>
                <h1>Development</h1>
                <p>This is some dummy text to display on this website to view how it turns out. This text will not be
                    used nor is it relevant. Articles are written to display how precise the writing is. Dummy text is
                    written just as a display in a certain section. Strangely enough the dummy text is not yet enough,
                    so more nonsense must be written down just to prove a point. Hopefully the font-size and
                    font-family is nice and modern and definitely precise.</p>
            </div>
            <div>
                <i class="fas fa-bullhorn icon_img"></i>
                <h1>Consulting</h1>
                <p>This is some dummy text to display on this website to view how it turns out. This text will not be
                    used nor is it relevant. Articles are written to display how precise the writing is. Dummy text is
                    written just as a display in a certain section. Strangely enough the dummy text is not yet enough,
                    so more nonsense must be written down just to prove a point. Hopefully the font-size and
                    font-family is nice and modern and definitely precise.</p>
            </div>
        </div>
    </section>
    <script>
        let press = false;
        document.querySelector('.hamburger-bar').addEventListener('click', process);

        function process() {
            if (!press) {
                document.querySelector('.short-hand').classList.add('show');
                document.querySelector('#sect_1').style.minHeight = '550px';
                press = true;
            } else {
                document.querySelector('.short-hand').classList.remove('show');
                document.querySelector('#sect_1').style.minHeight = '400px';
                press = false;
            }
        }

        function media(x) {
            if (x.matches) {
                document.querySelector('.short-hand').classList.remove('show');
                document.querySelector('#sect_1').style.minHeight = '400px';
                press = false;
            }
        }

        var x = window.matchMedia("(min-width:450px)")
        media(x)
        x.addListener(media);
    </script>
</body>

</html>