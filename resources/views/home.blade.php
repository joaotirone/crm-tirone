@extends('layouts.sideba')


@section('body')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- Inclua o arquivo JavaScript do Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<br>
<div class="container">
  <div class="row">
<div class="col-md-11.5 mx-auto ">
<div class="card mb-10 divback">
<div class="card-header text-header  title-white">
    
</div>
<div class="form-row"> 
<div class="card-body ">
<div class="col-11.3">

<div class="card mb-12  search-box p-4">

<br>
    <h1 class="title-white">DashBoard</h1>
    <br>
    <br>
    @if (Auth::check())
    <h3 class="title-white">Seja bem vindo {{Auth::User()->name}}</h3>
    @else
    <h3>Entre Novamente</h3>
    @endif
    <br>
    <br>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-6">
            <div class="card divgrafico">
            <div class="card-header text-header title-white" style="color:black;">
            Vendas do mês
            </div>
            <div class="card-body">
                    
                    <canvas class="title-white" id="barChart"></canvas>
                    

            </div>
            </div>
        </div>
    </div>
</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dados = @json($dados); // Converte os dados PHP para um objeto JavaScript

        var labels = dados.map(function(dado) {
            return dado.status_sales;
        });

        var data = {
            labels: labels,
            datasets: [{
                label: 'Vendas do mês',
                data:  dados.map(function(dado) {
                    return dado.total;
                }),
                backgroundColor: ['#3761f3'], // Defina as cores desejadas para os dados,
                borderColor: '#3761f3', // 100, 149, 237, 1 Azul   //139, 0, 0, 1 Vermelho
                borderWidth: 2
            }]
        };

        var ctx = document.getElementById('barChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            color: '#000405' // Defina a cor dos números abaixo do gráfico
                        }
                    },
                    y: {
                        ticks: {
                            color: '#000405' // Defina a cor dos números ao lado do gráfico
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        
                        color: 'white', // Define a cor do título
                        font: {
                            size: 14,
                            weight: 'bold'
                        }
                    },
                    legend: {
                        labels: {
                            color: '#000405'
                        }
                    }
                }
            }
        });
    });

</script>



@endsection