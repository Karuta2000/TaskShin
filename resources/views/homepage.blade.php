<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>TaskShin</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('icons/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <style>
        @font-face { font-family: Roboto; src: url('{{ asset('fonts/roboto/Roboto-Regular.ttf') }}'); } 
        * {
            font-family: Roboto, sans-serif;
        }
    </style>
</head>

<body class="bg-light bg-gradient" style="display: flex; flex-direction: column; min-height: 100vh;">
    <!-- Navbar -->
    <x-navbar />
    <!-- End Navbar -->
    <!-- Main Content -->
    <div class="pt-5 w-100 homepage-cover" style="background-image: url('{{ asset('images/homepagewallpaper.jpg') }}'); height: 400px">
        <div class="container">
            <h1 class="mb-3">Welcome to the TaskShin application.</h1>
            <p>This app for creating projects, tasks, and notes will help you increase productivity and efficiency while keeping all important information at your fingertips. 
              With its help, you will have greater control over your projects and tasks, while also facilitating collaboration with your team.
            </p>
        </div>
        

    </div>

    <!-- End Main Content -->

    <section id="features" class="py-5" style="flex: 1">
        <div class="container">
          <div class="row">

            <div class="col-md-4">
              <div class="feature-box">
                <h3>Integrated Notes for Efficient Records</h3>
                <p>With our application, you don't need a separate app for notes. You can easily create and save notes directly within your projects and tasks. You can organize them into categories, add keywords, and search within them. This way, you will have all important information in one place.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="feature-box">
                <i class="fas fa-chart-bar fa-3x"></i>
                <h3>Organize Your Projects More Efficiently</h3>
                <p>Our application allows you to create and track projects of various sizes and complexities. With an intuitive interface, you can easily add, edit, and neatly organize your tasks and notes. You will never lose important information or unfinished tasks again.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="feature-box">
                <i class="fas fa-mobile-alt fa-3x"></i>
                <h3>Customization According to Your Needs</h3>
                <p>We understand that everyone has their own preferred ways of organization. That's why our application allows you to customize the layout, colors, and other aspects to fit your individual needs. You will feel like the app is exactly what you want it to be.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
     
      

    <x-footer />

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>




</html>
