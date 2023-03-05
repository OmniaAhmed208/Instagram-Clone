<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    </head>

<body>

<div class="container my-5 row mx-auto">
    <div class="col-lg-5 col-sm-10 mx-auto">
<div  class=" border">
    
    <div style="width: 70%" class="my-5 mx-auto text-center">
    <img class="w-75" src="{{ asset('img/logo.png') }}" alt="instagram logo">
    <p style="font-size: 18px" class="fw-semibold text-secondary text-center">Sign up to see photos and videos from your friends.</p>    
</div>

    <form action="{{ route('register.save') }}" class="w-75 mx-auto" method="POST">
        @csrf

            <input name="email" type="email" 
                   placeholder="Email" 
                   class="form-control my-3 @error('email') is-invalid @enderror">

            @error('email')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror

            <input name="first_name" type="text" 
                   placeholder="First name" 
                   class="form-control my-3 @error('first_name') is-invalid @enderror">

            @error('first_name')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror

            <input name="last_name" type="text"   
                   placeholder="Last name" 
                   class="form-control my-3 @error('last_name') is-invalid @enderror">

            @error('last_name')
            <span class="invalid-feedback">{{ $message }}</span>
                
            @enderror
            <input name="password" type="password" 
                   placeholder="Password" 
                   class="form-control my-3 @error('password') is-invalid @enderror">

            @error('password')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror

            <div style="font-size: 13px" class="text-secondary text-center">
                <p>People who use our service may have uploaded your contact information to Instagram. <a href="#" class="text-decoration-none">Learn More</a></p>
                <p>By signing up, you agree to our<a class="text-decoration-none"> Terms </a>,<a class="text-decoration-none"> Privacy Policy</a> and <a class="text-decoration-none"> Cookies Policy</a></p>
            </div>

           
            <div class="text-center">
            <button type="submit" class="my-3 btn btn-primary opacity-75 w-100 fw-semibold">Sign up</button>
        </div>
    </form>

</div>
<div class="col-12 border p-4 my-3">
    <p style="font-size: 14px" class="text-center my-auto">Have an account? <a href="{{ route('login') }}" class="text-decoration-none">Log in</a></p>
</div>
</div>

</div>

</body>
</html>

