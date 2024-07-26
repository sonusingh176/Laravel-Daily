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
            <h1>Register</h1>
            <form action="{{route('registerSave')}}" method="POST">
                @csrf
    
                <div class="row">
                    <div class="col-auto">
                        <div class="mb-3">
                            <label for="InputName" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="username">
                        </div>
            
                        <div class="mb-3">
                            <label for="InputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="useremail">
                        </div>
            
                        <div class="mb-3">
                            <label for="InputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="userpassword">
                        </div>
            
                        <div class="mb-3">
                            <label for="InputConfirmPassword" class="form-label"> Confirm Password</label>
                            <input type="password" name="password_confirmation" id="userpassword" class="form-control">
                        </div>
            
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>