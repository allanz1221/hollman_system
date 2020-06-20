@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="background-image: url('fondo2.png');">

            <div class="m-3 row justify-content-center">
                @if (auth()->user()->rol_id == 1)
                    Usuario ADMIN
                @else
                     <div class="col" style="margin: 10px">
                   <h1> {{ auth()->user()->empresa->nombre }} </h1>
                    </div>
                    <div>
                                                
                        @if(auth()->user()->empresa->logo != "")
                            @foreach(explode("/",auth()->user()->empresa->logo) as $nombre_foto)
                                @if ($nombre_foto != 'public')
                                    <img src="../storage/{{$nombre_foto}}" width="100px"/>
                                @endif
                            @endforeach
                        @endif
                    </div>
                @endif
            </div>

            <div class="row">

            @foreach ($salas as $sala)
                {{-- <div class="m-3 row justify-content-center"> {{ $sala->empresa->nombre }} </div> --}}
                <div class="col-sm-4">
                  <div class="cardx">
                    <div class="card-body">
                      <h5 class="card-title center-block font-weight-light">{{ $sala->nombre }}</h5>

                        @if (auth()->user()->rol_id == 1)
                        <p class="sala">{{ $sala->empresa->nombre }}</p>
                        @endif

                      @foreach ($sensores as $sensor)
                        @if ($sensor->sala_id == $sala->id)
                            <div class="row">
                                <div class="col">
                                    {{ $sensor->nombre }}
                                    
                                </div>
                                <div id="x-{{ $sensor->id }}" class="sensor col">
                                </div>
                                <div id="y-{{ $sensor->id }}" class="date col"> </div>

                            </div>
                            @endif
                        @endforeach
  
                     
                    
                      <a href="{{ route('detalles',$sala->id)}}" class="btn btn-success">ENTRAR</a>
                    </div>
                  </div>
                </div>

            @endforeach 
           
        </div>

        <br>

        </div>


        <div class="col-md-12" style="background-image: url('barra-03.png');">
            <img src="logo_foot-04.png" width="150px" />
        </div>
    </div>

</div>
<script>

$(document).ready(function(){
        $(".sensor").each(function(){
       		IDX = $(this).attr('id');
            var ID = IDX.split("-");
            $.get("http://sistema.energiahollman.com/api/sensor?id="+ID[1], function(data, status){
                var obj = JSON.parse(JSON.stringify(data));

                temp_div = "#x-"+ID[1];
                date_div = "#y-"+ID[1];
                if(typeof obj.data !== 'undefined'){
                    $(temp_div).html(obj.data.temperatura + " Cº");
                }
                if(typeof obj.data !== 'undefined'){
                    var currentDateTimeCentralTimeZone = new Date(obj.data.created_at.toLocaleString('en-US', { timeZone: 'America/Hermosillo' }));
                    var tiempo = currentDateTimeCentralTimeZone.toLocaleDateString() + " " + currentDateTimeCentralTimeZone.getHours() + ":"+ currentDateTimeCentralTimeZone.getMinutes();

                    $(date_div).html(tiempo);
                }
            });
       	});
    });
           </script>


@endsection
