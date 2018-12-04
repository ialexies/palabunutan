<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


        <title>Palabunutan</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

.table-hover > tbody > tr:hover {
  background-color: #D2D2D2;
}

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
 

            <div class="content">
                <h5>Ang nabunot ni {{ $bubunot_name }} ay si</h5>
                <div class="title m-b-md">
                {{$nabunots_name}}
                <!-- @foreach($nabunots as $nabunot)
                    {{ $nabunot->name }}
                @endforeach -->
                </div>
                <a href="/" class="btn btn-info" role="button">Bumalik</a>
            </div>

     

            <script>
(function (global) { 

if(typeof (global) === "undefined") {
    throw new Error("window is undefined");
}

var _hash = "!";
var noBackPlease = function () {
    global.location.href += "#";

    // making sure we have the fruit available for juice (^__^)
    global.setTimeout(function () {
        global.location.href += "!";
    }, 50);
};

global.onhashchange = function () {
    if (global.location.hash !== _hash) {
        global.location.hash = _hash;
    }
};

global.onload = function () {            
    noBackPlease();

    // disables backspace on page except on input fields and textarea..
    document.body.onkeydown = function (e) {
        var elm = e.target.nodeName.toLowerCase();
        if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
            e.preventDefault();
        }
        // stopping event bubbling up the DOM tree..
        e.stopPropagation();
    };          
}

})(window);
            </script>
     

        </div>
    </body>
</html>
