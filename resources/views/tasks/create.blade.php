@extends('layouts.main')

@section('title', 'Criar Tarefa')

@section('content')

<div id="task-create-container" class="col-md-6 offset-md-3">
    <h1>Crie sua tarefa</h1>
    <form action="/tasks" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Tarefa:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Tarefa...">
        </div>
        <div class="form-group">
            <label for="urgency">Urgência:</label>
            <select class="form-control" id="urgency" name="urgency">
              <option value="Alta">Alta</option>
              <option value="Média">Média</option>
              <option value="Baixa">Baixa</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Tarefa">
    </form>
</div>

@endsection