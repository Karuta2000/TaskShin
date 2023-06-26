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
        @font-face {
            font-family: Roboto;
            src: url('{{ asset('fonts/roboto/Roboto-Regular.ttf') }}');
        }

        * {
            font-family: Roboto, sans-serif;
        }
    </style>
</head>

<body class="bg-light bg-gradient" style="display: flex; flex-direction: column; min-height: 100vh;">
    <!-- Navbar -->
    <x-navbar />
    <!-- End Navbar -->

    <div class="container">
        <h1 class="my-5">Changelog</h1>

        <div class="changelog-entry">
          <h2>v0.1</h2>
          <p>Released on June 23, 2023</p>
          <h3>New Features:</h3>
          <ul>
            <li>User Interface: TaskShin now has a sleek and intuitive user interface, providing a seamless user experience.</li>
            <li>Projects: Users can now create projects to organize their tasks and notes efficiently. Each project has its own dedicated space.</li>
            <li>Notes: Users can create and manage notes within TaskShin, making it easier to jot down ideas, reminders, and important information.</li>
            <li>Tags: A tagging system has been implemented, allowing users to categorize tasks and notes for better organization and quick filtering.</li>
            <li>Tasks: Users can create and manage tasks within projects, ensuring a structured approach to completing their goals.</li>
          </ul>
        
          <h3>Framework and Libraries:</h3>
          <ul>
            <li>Laravel and Jetstream Base: TaskShin is now built on the Laravel framework and utilizes Jetstream Base as the authentication scaffolding, ensuring a robust and secure foundation.</li>
          </ul>
        </div>
    </div>

    <x-footer />

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>




</html>
