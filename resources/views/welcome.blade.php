@extends('layouts.main')

@section('title', 'Eco Consultoria')

@section('content')

<div id="search-container" class="col-md-12">
    @auth
        <h1>Busque uma tafera</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    @endauth
</div>
<div id="tasks-container" class="col-md-12">
    @auth
        @if($search)
            <h2>Buscando por: {{ $search }}</h2>
        @else
            <h2>Suas tarefas</h2>
        @endif
        <div id="cards-container" class="row">
            @foreach($tasks as $task)
                <div class="card col-md-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $task->urgency}}</h6>
                    </div>
                </div>
            @endforeach
            @if(count($tasks) == 0 && $search)
                <p>Não foi encontrada nenhuma tarefa! <a href="/">Ver todas as suas tarefas</a></p>
            @elseif(count($tasks) == 0)
                <p>Não há tarefas</p>
            @endif
        </div>
    @endauth
</div>

@endsection