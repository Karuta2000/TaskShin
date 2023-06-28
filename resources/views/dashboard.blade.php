@extends('app')

@section('content')
    <h1>Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}, you are cool today! </p>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card bg-primary bg-gradient text-white mb-4 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Projects</h5>
                        <p class="card-text">Total:
                            {{ App\Models\Project::where('user_id', auth()->user()->id)->get()->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-success bg-gradient text-white mb-4 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Tasks</h5>
                        <p class="card-text">Total:
                            {{ App\Models\Task::where('user_id', auth()->user()->id)->get()->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-danger bg-gradient text-white mb-4 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Images</h5>
                        <p class="card-text">Total:
                            {{ App\Models\Image::where('user_id', auth()->user()->id)->get()->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-warning bg-gradient text-white mb-4 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Tags</h5>
                        <p class="card-text">Total:
                            {{ App\Models\Tag::where('user_id', auth()->user()->id)->get()->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-info text-white mb-4 bg-gradient">
                    <div class="card-body">
                        <h5 class="card-title">Notes</h5>
                        <p class="card-text">Total: {{ App\Models\Note::where('user_id', auth()->user()->id)->get()->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
