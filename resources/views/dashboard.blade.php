@extends('layout')

@section('content')
    <h1>Dashboard</h1>
    <p>Zde jsou důležité informace</p>
    <div class="card">
        <div class="card-header bg-dark text-light">
            <h2>Nejnovější projekty</h2>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($projects as $project)
                    @component('components.project-card', ['project' => $project])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-md-8 offset-md-2">
            <h1>Dashboard ve vývoji</h1>
            <p>Zde bude pěkný dashboard v několika příštích dnech</p>
            <canvas class="w-50" id="tagChart"></canvas>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('tagChart');
        
        var tags = {!! json_encode($tags) !!}
        console.log(tags);
        var tag_names = [];
        var tag_values = [];


        for (var i = 0; i < tags.length; i++) {

            tag_names[i] = tags[i].name;
        }

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: tag_names,
                datasets: [{
                    label: 'Počet projektů',
                    data: [1, 3],
                    borderWidth: 1
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
    </script>
@endsection
