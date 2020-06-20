@extends('layouts.app')

@section('content')

<div class="container">


    
    <div class="row justify-content-center">
        <ol class="breadcrumb col-md-12">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"> {{ $sala->empresa->nombre }}</li>
        </ol>

        <div class="breadcrumb col-md-12">

            <form method="get">

            <div class="container">
                <div class="row">
                  <div class="col">
                    <div class="input-group date dpdate"> 
                        <label for="inicio">Del </label>
                        <input type="text" value="{{ $finicio }}"  name="inicio" id="inicio" class="form-control">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group date dpdate">
                        <label for="fin">Al </label>
                        <input type="text" value="{{ $fifin }}" name="fin" id="fin" class="form-control">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                  </div>
                  <div class="col">
                    <input type="submit" class="btn btn-primary" value="Confirmar" >

                  </div>
                </div>
              </div>


            </form>

        </div>
        
        <div class="col-md-12" style="background-image: url('../fondo2.png');">
            <div class="m-3 col">
                <div class="row">

                    <div class="m-3 col justify-content-center">
                        <h1> </h1>
                    </div>

                    <div class="m-3 col justify-content-center">
                        <div>
                            {{ $sala->empresa->nombre }}
                            </div>
                        <h1>{{$sala->nombre}}</h2>
                           
                    </div>

                    <div class="m-3 col justify-content-center">
                       
                        @foreach(explode("/",$sala->empresa->logo) as $nombre_foto)
                        @if ($nombre_foto != 'public')
                        
                            <img src="../storage/{{$nombre_foto}}" width="50px"/>
                        @endif
                        @endforeach
                    
                    
                    </div>
                </div>
                    

            </div>


            @foreach ($sensores as $sensor)
            <div class="container">

            <div class="row">
                
                <div class="col-lg">

                    <canvas id="myChart-{{$sensor->id}}" width="100%"></canvas>



                </div>

                <div class="col-lg">
                    {{-- table-striped table-hover table-borderless --}}
                    <table id="tabla" class="table">
                                <thead>
                                    <tr>
                                        <td>
                                            Id
                                        </td>
                                        <td>
                                            Sensor
                                        </td>
                                        <td>
                                            Grados
                                        </td>
                                        <td>
                                            Hora
                                        </td>
                                        <td>
                                            Fecha
                                        </td>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registros as $registro)
                                    @if ($registro->sensor_id ==  $sensor->id)

                                    <tr>
                                        <td>
                                            {{ $registro->id }}
                                        </td>
                                        <td>
                                            {{ $registro->sensor->nombre }}
                                        </td>
                                        <td>
                                            {{ $registro->temperatura }}
                                        </td>
                                        <td>
                                            {{$registro->created_at->format('H:i:s')}}

                                        </td>
                                        <td>
                                            {{$registro->created_at->format('j F, Y')}}
                                        </td>
                                    </tr>

                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            
                        
                    </div>
                </div>
            </div>

            @endforeach




        </div>
        <div class="col-md-12" style="background-image: url('../barra-03.png');">
            <img src="../logo_foot-04.png" width="150px" />
        </div>
    </div>

</div>
<script>
    $(document).ready(function(){
           @foreach($sensores as $sensor)
            var ctx = document.getElementById('myChart-{{$sensor->id}}').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: [
                        @foreach ($registros_grafica as $registro)
                            @if ($registro->sensor_id ==  $sensor->id)
                                '{{$registro->created_at}}',
                            @endif
                        @endforeach  
                        ],
                        datasets: [{
                            label: 'Temperatura por día',
                            data: [
                            @foreach ($registros_grafica as $registro)
                            @if ($registro->sensor_id ==  $sensor->id)
                                {{ $registro->temperatura }},
                            @endif
                            @endforeach
                            ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            @endforeach 

            $('.table').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            } );
            $('.dpdate').datepicker({
                format: "dd/mm/yyyy"
            });
   
    });

    </script>
@endsection
