<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.3.1/p5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.10.2/addons/p5.sound.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <meta charset="utf-8" />
</head>

<body style="background-color: rgb(39, 37, 37);">
    <div class="container">

        <nav class="navbar bg-primary text-white my-1 mx-n3 rounded">
            <a href="#" class="navbar-brand text-reset h4">Conteste el mapa mental</a>
            <div class="form-inline">
                <button id="open-btn" class="btn btn-outline-light rounded ml-3"><i class="bi bi-folder2-open"></i></button>
                <div id="sign-in-dropdown" class="btn-group">
                    <button type="button" class="btn btn-outline-light ml-3 dropdown-toggle" data-toggle="dropdown">Sign in </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <form>
                            <div class="form-group px-3">
                                <label for="email" class="py-2">Email address:</label>
                                <input type="email" id="email" class="form-control" placeholder="input your email address">
                            </div>
                            <div class="form-group px-3">
                                <label for="password" class="py-2">Password:</label>
                                <input type="password" class="form-control" id="password" placeholder="input your password">
                            </div>
                            <button type="button" id="sign-in-btn" style="display: inline;" class="btn btn-success m-3">Sign in</button>
                            <button type="button" id="sign-up-btn" style="display: inline;" class="btn btn-outline-secondary m-3">Sign up</button>
                        </form>
                    </div>
                </div>
                <span id="user-icon" class="bi bi-person ml-3"></span>
                <span id="user-email" class="ml-2"></span>
                <div id="user-dropdown" class="btn-group">
                    <button type="button" class="btn text-white dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu dropdown-menu-right text-right">
                        <button id="user-settings-btn" class="dropdown-item" type="button">User settings</button>
                        <button id="sign-out-btn" class="dropdown-item text-success" type="button">Log out</button>
                        <button id="delete-account-btn" class="dropdown-item text-danger" type="button">Delete my account</button>
                    </div>
                </div>
            </div>
        </nav>

        <div class="row justify-content-md-between mb-3">

            <!-- KEYWORD SETTING BAR -->
            <div class="col bg-secondary border border-secondary mr-1">
                <h5 class="my-3 text-white">Settings for:</h5>
                <div class="form-group">
                    <select id="settings-for-select" class="custom-select my-2" value="keyword">
                        <option>keyword</option>
                        <option>mindmap</option>
                    </select>
                    <input id="keyword-input" class="form-control my-2" type="text" placeholder="input new text" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <select id="select-color-for" class="custom-select my-2">
                        <option>set color for...</option>
                        <option>keyword background</option>
                        <option>text</option>
                        <option>border</option>
                        <option>line</option>
                        <option>mind map background</option>
                    </select>

                    <input id="color-picker" type="color" class="input my-2">
                </div>
                <div id="contenedorItems" class="contenedor">
                </div>
            </div> <!-- the end of aside navbar col -->

            <!-- CANVAS -->
            <div id="canvas" class="col" style="border: 1px solid grey; margin: 0; padding: 0; width: 906px; height: 641px">
            </div>
        </div>
    </div>

    <!-- FIREBASE -->
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/scketchUser.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>