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
            <h2>v0.5</h2>

            <p>Released on July 2, 2023:</p>
            <h3>Updated Profile Page:</h3>
            <p>The profile page has been updated to provide more comprehensive personal information, including a
                description and relevant statistics.</p>

            <h3>Dynamic Settings:</h3>
            <ul>
                <li>Preferences: A new section called "Preferences" has been added to the settings, allowing users to
                    set default values for tasks and notes for a more streamlined workflow.</li>
                <li>Profile Settings: The settings now include a dedicated "Profile Settings" page, making it easier for
                    users to modify their profile information.</li>
            </ul>

            <h3>Task and Note Updates:</h3>
            <p>Small updates have been made to the tasks and notes functionality, improving their overall usability and
                performance.</p>

            <h3>Toast Notifications for Successful Changes:</h3>
            <p>After saving settings, a toast notification now appears in the bottom-right corner, informing the user
                about the successful changes made.</p>

            <h3>Note Manager Improvement:</h3>
            <p>The note manager has been improved to enhance its functionality and user experience.</p>

            <h3>Code Optimization:</h3>
            <p>The codes in various components have been optimized for better performance and efficiency.</p>

            <h3>Tag Placement:</h3>
            <p>The tag feature has been moved from the navbar to the user dropdown menu, offering a more streamlined and
                organized navigation experience.</p>
        </div>

        <div class="changelog-entry">
            <h2>v0.4</h2>
            <p>Released on June 29, 2023</p>
            <h3>New Features:</h3>
            <ul>
                <li>Enhanced Image Functionality: The image feature has been expanded with the addition of tags. Users
                    can now add tags to images, allowing for easier organization and searching based on tags.</li>
                <li>Image Search: Users can now search for specific images based on their tags, making it convenient to
                    locate images within the gallery.</li>
                <li>Image Management: Users can delete images or set them as avatars, providing more control and
                    customization options for their image collection.</li>
                <li>Pagination in Image Gallery: The image gallery now includes pagination, improving the browsing
                    experience when viewing a large number of images.</li>
            </ul>

            <h3>Task Updates:</h3>
            <ul>
                <li>Task Card Layout: Tasks have been updated from a table view to a more visually appealing card
                    layout, offering a more engaging and intuitive task management experience.</li>
                <li>Improved Task Modal: The task modal in the tasks page has been improved, providing a better user
                    interface and enhancing the overall user experience.</li>
            </ul>

        </div>



        <div class="changelog-entry">
            <h2>v0.3</h2>
            <p>Released on June 28, 2023</p>
            <h3>New Features:</h3>
            <ul>
                <li>Improved Notes: Notes have undergone significant improvements, making it easier to add and edit
                    them. The cumbersome use of modals has been eliminated, allowing users to work directly with each
                    note.</li>
                <li>Images: TaskShin now supports images as a new feature. Users can save images on a dedicated page,
                    although currently, only viewing functionality is available. Additional features related to images
                    will be introduced in future updates.</li>
            </ul>

            <h3>Enhancements:</h3>
            <ul>
                <li>Design Improvements: The navbar and overall design of TaskShin have been enhanced. The main colors
                    of the page now align with the colors of the logo, creating a more cohesive visual experience.</li>
                <li>Removal of Unused Files and Components: Outdated and unused files and components have been removed,
                    optimizing the application's codebase and improving performance.</li>
                <li>Increased Usage of Livewire: Livewire has been further integrated throughout TaskShin, enhancing
                    real-time interactivity and providing a more seamless user experience.</li>
            </ul>

        </div>



        <div class="changelog-entry">
            <h2>v0.2</h2>
            <p>Released on June 26, 2023</p>
            <h3>New Features:</h3>
            <ul>
                <li>Profile: Users now have a dedicated profile page where they can view and update their personal
                    information.</li>
                <li>Enhanced User Settings: TaskShin introduces additional settings options, allowing users to customize
                    their experience and preferences.</li>
            </ul>

            <h3>Framework and Libraries:</h3>
            <ul>
                <li>Transition from Jetstream to Breeze: TaskShin has migrated from Jetstream to Breeze for
                    authentication, providing a simplified and customizable authentication system.</li>
                <li>New Login and Register Forms: TaskShin introduces redesigned login and register forms, offering an
                    improved user experience.</li>
            </ul>

            <h3>Project Updates:</h3>
            <ul>
                <li>Project Images: Users can now add images to each project, making it visually appealing and easier to
                    recognize.</li>
                <li>Improved Design: The design of projects has been enhanced, creating a more visually pleasing and
                    intuitive layout.</li>
                <li>Completely New Project Page: The project page has been redesigned from scratch, providing a better
                    overview and management of project-related tasks and notes.</li>
            </ul>

            <h3>Task Enhancements:</h3>
            <ul>
                <li>Priority Setting: Users can now assign priorities to tasks, helping them prioritize their work and
                    focus on the most important tasks.</li>
                <li>Enhanced Task Search: TaskShin offers more advanced search functionality for tasks, enabling users
                    to find specific tasks quickly and efficiently.</li>
            </ul>

            <h3>Improvements to Tags, Tasks, and Notes:</h3>
            <ul>
                <li>Streamlined Workflow: Adding tags, tasks, and notes has been improved for a smoother and more
                    intuitive user experience.</li>
                <li>Improved Colors: TaskShin now offers enhanced color options, allowing users to customize the visual
                    appearance of their tasks, projects, and notes.</li>
                <li>Navbar Improvements: The navigation bar has been refined, providing better accessibility and ease of
                    use.</li>
            </ul>

            <h3>Changelog on Homepage:</h3>
            <ul>
                <li>TaskShin's homepage now features a dedicated changelog section, keeping users informed about the
                    latest updates and improvements.</li>
            </ul>
        </div>

        <div class="changelog-entry">
            <h2>v0.1</h2>
            <p>Released on June 23, 2023</p>
            <h3>New Features:</h3>
            <ul>
                <li>User Interface: TaskShin now has a sleek and intuitive user interface, providing a seamless user
                    experience.</li>
                <li>Projects: Users can now create projects to organize their tasks and notes efficiently. Each project
                    has its own dedicated space.</li>
                <li>Notes: Users can create and manage notes within TaskShin, making it easier to jot down ideas,
                    reminders, and important information.</li>
                <li>Tags: A tagging system has been implemented, allowing users to categorize tasks and notes for better
                    organization and quick filtering.</li>
                <li>Tasks: Users can create and manage tasks within projects, ensuring a structured approach to
                    completing their goals.</li>
            </ul>

            <h3>Framework and Libraries:</h3>
            <ul>
                <li>Laravel and Jetstream Base: TaskShin is now built on the Laravel framework and utilizes Jetstream
                    Base as the authentication scaffolding, ensuring a robust and secure foundation.</li>
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
