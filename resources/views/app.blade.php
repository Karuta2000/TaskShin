<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TaskShin</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap 4.6.2/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">
    <livewire:styles />


    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

</head>

<body class="app-background" style="background-image: url('{{ asset('images/background.jpg') }}')">

    @livewire('app.navbar.main')

    

    <div class="container-fluid py-3">

        @yield('content')

    </div>


    @livewire('app.success-toast')



    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="{{ asset('js/bootstrap 4.6.2/bootstrap.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.js') }}"></script>
    <livewire:scripts />
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('show-success-toast', function () {
                var successToast = new bootstrap.Toast(document.querySelector('.toast'));
                successToast.show();
            });
        });
    </script>


</body>

</html>
