<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

    <form method="post" action="{{route('register.store')}}">
      @csrf
      <div class="container mt-5">
        <div class="row d-flex justify-content-center ">
          @if (session('message'))
          <div class="alert alert-info text-center">{{ session('message') }}</div>
          @endif
      
          <div class="text-center m-5">
            <h1>Register</h1>
          </div>
          <div class="col-md-6">

                  <!-- Name input -->
                  <div class="{{ $errors->has('name') ? 'has-error' : '' }}">
                  <div class="form-outline mb-4">
                    <input type="text" id="form2Example1" class="form-control" name="name" value="{{old('name')}}"/>
                    <label class="form-label" for="form2Example1">User Name</label>
                    @if ($errors->has('name'))
                    <div class="help-block" style="color:rgb(208, 46, 46);">
                    {{ $errors->first('name') }}
                    </div>
                    @endif
                  </div>
                </div>

                   <!-- Email input -->
                   <div class="{{ $errors->has('email') ? 'has-error' : '' }}">
                   <div class="form-outline mb-4">
                    <input type="email" id="form2Example1" class="form-control" name="email" value="{{old('email')}}"/>
                    <label class="form-label" for="form2Example1">Email address</label>
                    @if ($errors->has('email'))
                    <div class="help-block" style="color:rgb(208, 46, 46);">
                    {{ $errors->first('email') }}
                    </div>
                    @endif
                  </div>
                </div>
                
                  <!-- Password input -->
                  <div class="{{ $errors->has('password') ? 'has-error' : '' }}">
                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example2" class="form-control" name="password"/>
                    <label class="form-label" for="form2Example2">Password</label>
                    @if ($errors->has('password'))
                    <div class="help-block" style="color:rgb(208, 46, 46);">
                    {{ $errors->first('password') }}
                    </div>
                    @endif
                  </div>
                </div>

                <!-- Password Confirmation input -->
                <div class="{{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example2" class="form-control" name="password_confirmation"/>
                    <label class="form-label" for="form2Example2">Password Confirmation</label>
                    @if ($errors->has('password_confirmation'))
                    <div class="help-block" style="color:rgb(208, 46, 46);">
                    {{ $errors->first('password_confirmation') }}
                    </div>
                    @endif
                    <div class="text-end"><a href="/">Login</a></div>
                  </div>
                </div>
              
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
          </div>
        </div>
      </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
