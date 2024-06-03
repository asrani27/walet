
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/loginform/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/loginform/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/loginform/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="/loginform/css/style.css">

    <title>Login </title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('sarang.jpeg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
			<div class="text-center">
			<img src="/walet.png" width="120px">
            <h3>Login to <strong>Aplikasi Sarang Burung Walet</strong></h3>
			</div>
            {{-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> --}}
            <form action="/login" method="POST">
				@csrf
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="username" name="username">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" name="password">
              </div>
              

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="/loginform/js/jquery-3.3.1.min.js"></script>
    <script src="/loginform/js/popper.min.js"></script>
    <script src="/loginform/js/bootstrap.min.js"></script>
    <script src="/loginform/js/main.js"></script>
	@include('sweetalert::alert')
  </body>
</html>