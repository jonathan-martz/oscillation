<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Oscillation - Logout</title>
</head>

<body class="antialiased">
    <header>
        <x-header />
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    if (!empty($_COOKIE['username']) && !empty($_COOKIE['token'])) {
                        $_COOKIE['username'] = null;
                        $_COOKIE['token'] = null;
                        echo 'Logout successfull.<br>';
                        echo 'Zum Login: <a href="/login" class="btn btn-primary">LINK</a>';
                    } else {
                        echo 'Your not logged in. <br>';
                        echo 'Zum Login: <a href="/login" class="btn btn-primary">LINK</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <x-footer />
    </footer>

</body>
<x-css />

</html>
