<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    

    <div class="container-sm">
        <div class="m-auto">
            <h1>Login</h1>
            <form action="{{route('loginMatch')}}" method="POST">

                @csrf
    
                <div class="row">
                    <div class="col-auto">
                        
            
                        <div class="mb-3">
                            <label for="InputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
            
                        <div class="mb-3">
                            <label for="InputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
            
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                      
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/"  class="btn btn-warning">Back</a>
                    </div>
                </div>
            
            </form>

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                        
                    @endforeach
                </ul>
            </div>
        @endif


        </div>
     
    </div>

    <script>
        document.addEventListener('DOMContentLoaded',(event) => {
            if (navigator.geolocation) {

                function gotLocation(position){
                    document.getElementById('latitude').value = position.coords.latitude;
                    document.getElementById('longitude').value = position.coords.longitude;
                }

                function failedToGet(){
                    console.log("There was some problem retrieving the geolocation");
                }


                navigator.geolocation.getCurrentPosition(gotLocation, failedToGet);

            } else {
                alert("Geolocation is not supported by this browser.");
            }
        });

        /**
         * 
         * Window Navigator Object
            |
            |--- The navigator object contains information about the browser.
            |--- The navigator object is a property of the window object.
            |--- The navigator object is accessed with: window.navigator or just navigator:
            |--- Navigator Object Properties
                    |--- geolocation :	Returns a geolocation object for the user's location
                    |--- onLine	     :  Returns true if the browser is online
                    |--- appName	 :  Returns browser name
                    |---
         * 
         * 
        */
        
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>