<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Oscillation - Login</title>
</head>

<body class="antialiased">
    <header>
        <x-header />
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <form action="/submit" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="container px-0">
                            <div class="mb-3 row">
                                <label for="staticUsername" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" class="form-control-plaintext" id="staticUsername" placeholder="jonathan">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="inputPassword">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-12">
                                    <button class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
