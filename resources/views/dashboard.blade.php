@extends('app')

@section('content')
    <h1>Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}, you are cute today! </p>
    @livewire('managers.project-manager', ['count' => 4])





    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const tagChart = document.getElementById('tagChart');
        const taskChart = document.getElementById('taskChart');


        var tags = {!! json_encode($tags) !!}
        var tag_names = [];
        var tag_colors = [];

        var tagCounts = {!! json_encode($tagCounts) !!}
        var taskCounts = {!! json_encode($taskCounts) !!}



        for (var i = 0; i < tags.length; i++) {

            tag_names[i] = tags[i].name;
            tag_colors[i] = '#' + tags[i].color.HEX;
        }


        new Chart(tagChart, {
            type: 'bar',
            data: {
                labels: tag_names,
                datasets: [{
                    label: 'Počet projektů',
                    data: tagCounts,
                    borderWidth: 1,
                    backgroundColor: tag_colors,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(taskChart, {
            type: 'doughnut',
            data: {
                labels: ['dokončené', 'nedokončené'],
                datasets: [{
                    label: 'Počet úkolů',
                    data: taskCounts
                }]
            }
        });
    </script>
@endsection
