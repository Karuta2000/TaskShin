@extends('app')

@section('content')
    <h1>Dashboard</h1>
    <div class="card">
        <div class="card-header bg-dark text-light">
            <h2>Newest project</h2>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($projects as $project)
                    @livewire('cards.project', ['project' => $project])
                @endforeach
            </div>
        </div>
    </div>

    

    





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
