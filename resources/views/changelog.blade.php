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

        <div class="changelog-entry">
          <h2>v0.2</h2>
          <p>Released on June 26, 2023</p>
          <h3>New Features:</h3>
          <ul>
            <li>Profile: Users now have a dedicated profile page where they can view and update their personal information.</li>
            <li>Enhanced User Settings: TaskShin introduces additional settings options, allowing users to customize their experience and preferences.</li>
          </ul>
        
          <h3>Framework and Libraries:</h3>
          <ul>
            <li>Transition from Jetstream to Breeze: TaskShin has migrated from Jetstream to Breeze for authentication, providing a simplified and customizable authentication system.</li>
            <li>New Login and Register Forms: TaskShin introduces redesigned login and register forms, offering an improved user experience.</li>
          </ul>
        
          <h3>Project Updates:</h3>
          <ul>
            <li>Project Images: Users can now add images to each project, making it visually appealing and easier to recognize.</li>
            <li>Improved Design: The design of projects has been enhanced, creating a more visually pleasing and intuitive layout.</li>
            <li>Completely New Project Page: The project page has been redesigned from scratch, providing a better overview and management of project-related tasks and notes.</li>
          </ul>
        
          <h3>Task Enhancements:</h3>
          <ul>
            <li>Priority Setting: Users can now assign priorities to tasks, helping them prioritize their work and focus on the most important tasks.</li>
            <li>Enhanced Task Search: TaskShin offers more advanced search functionality for tasks, enabling users to find specific tasks quickly and efficiently.</li>
          </ul>
        
          <h3>Improvements to Tags, Tasks, and Notes:</h3>
          <ul>
            <li>Streamlined Workflow: Adding tags, tasks, and notes has been improved for a smoother and more intuitive user experience.</li>
            <li>Improved Colors: TaskShin now offers enhanced color options, allowing users to customize the visual appearance of their tasks, projects, and notes.</li>
            <li>Navbar Improvements: The navigation bar has been refined, providing better accessibility and ease of use.</li>
          </ul>
        
          <h3>Changelog on Homepage:</h3>
          <ul>
            <li>TaskShin's homepage now features a dedicated changelog section, keeping users informed about the latest updates and improvements.</li>
          </ul>
        
          <h3>Bug Fixes:</h3>
          <ul>
            <li>Several bug fixes and performance enhancements have been implemented based on user feedback, ensuring a more stable and reliable application.</li>
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
