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

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                font-size: 50px;
                line-height: 50px;
                color: darkseagreen;
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
                margin-bottom: 40px;
            }

.table-hover > tbody > tr:hover {
  background-color: #D2D2D2;
}



/* width */
::-webkit-scrollbar {
    width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555; 
}


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Charity's <br> Palabunutan
                </div>
                

                <?php
                    $cookie_name = "cookienabunot";

                    if(!isset($_COOKIE[$cookie_name])) {
                        // echo "Cookie named '" . $cookie_name . "' is not set!";
                        echo "
                        <h5>Wala ka pang nabubunot<br>Piliin ang iyong pangalan sa ibaba</h5>";
                        
                    } else {
                        echo "<span style='color:red'>Ikaw ay nakabunot na<br> Ang iyong nabunot ay si <h2>-- " . $_COOKIE[$cookie_name] . " --</h2> <br></span>";
                        // echo "Value is: " . $_COOKIE[$cookie_name];
                    }
                ?>

                {{ Session::get('sessionbunnot')}}
                <div class="table-responsive" style="max-height:300px;     box-shadow: -3px 7px 20px 9px #0000003d;">
                    <table class="table  table-striped table-hover">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Nabunot</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count=1; ?>
                            @foreach($bunutans as $bunutan) 
                                <tr onclick="$('#bubunot2').html('{{$bunutan->name}}'); $('#bubunot').val('{{$bunutan->id}}'); " 
                                    <?php 

                                        if(!isset($_COOKIE[$cookie_name])) {
                                            if($bunutan->active==0){ echo 'data-toggle="modal" data-target="#myModal"';} 
                                            if($bunutan->active!=0){ echo 'data-toggle="modal" data-target="#myNakabunot"';} 
                                            

                                        }
                                        if($bunutan->active != '0') {echo 'class="table-danger"';}
                                        
                                    ?> > 
                                    <td style="width: 50px;">{{$count}}</td>
                                    <td  style=""  >
                                        @if($bunutan->active != 0) <del> @endif 
                                        {{$bunutan->name}}
                                        @if($bunutan->active != 0) </del> @endif 
                                    </td> 
                                    <td> 
                                    @if($bunutan->active != 0) 
                                        Meron Na
                                    @endif

                                    @if($bunutan->active == 0) 
                                        Wala pa
                                    @endif
                                    <!-- {{$bunutan->nabunot}} -->
                                    </td> 
                                </tr> 
                                <?php $count=$count+1; ?>
                            @endforeach 
                        </tbody>
                    </table>
                <div>
            </div>

            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Open modal
            </button> -->

            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Kamusta <span id="bubunot2"></span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                    <!-- <a href="{{route('bunot.pili',['bubunot'=>$bunutan->name])}}" class="btn btn-primary">Bumunot</a> -->

                    <form action="/nabunot" method="post">
                        {{csrf_field()}}
                        <input hidden type="text" id="bubunot" name="bubunot" />
                        <button type="submit" class="btn btn-primary">Bumunot</button>
                    </form>
                    </div>
                    
                    <!-- Modal footer
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                     -->
                </div>
                </div>
            </div>
            
            <div class="modal" id="myNakabunot">
                <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Nakabunot Na!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
            
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    
                </div>
                </div>
            </div>



        </div>
    </body>
</html>
