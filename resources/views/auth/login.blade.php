<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    </head>

    <body>

        <div class="container my-5 mx-auto py-5 row justify-content-evenly">
            <div class="col-lg-5">
                <img class="w-100 rounded-4" src="{{ asset('instagram.jpg')}}">

            </div>
            <div style="height:60vh" class="col-lg-4 col-sm-8 row">
                <div class="border col-12">
                <div style="width: 60%" class="my-5 mx-auto">
                <img class="w-100" src="{{ asset('img/logo.png') }}" alt="instagram logo">
                </div>

                <form action="{{ route('login.action') }}" class="w-75 mx-auto" method="POST">
                    @csrf
                    <input name="email" type="email" 
                           placeholder="Email" 
                           class="form-control my-3 @error('email') is-invalid @enderror">

                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                    <input name="password" type="password" 
                           placeholder="Password" 
                           class="form-control my-3 @error('password') is-invalid @enderror">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <div class="text-center">
                        <button type="submit" class="my-3 btn btn-primary opacity-75 w-100 fw-semibold">Log in</button>
                    </div>
                </form>

            </div>
            <div class="col-12 border p-4 my-3">
                <p style="font-size: 14px" class="text-center my-auto">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">Sign up</a></p>
            </div>

            </div>
            


        </div>



    </body>

</html>