@extends('app')
 
@section('content')
    <h2>Create Task for Project "{{ $project->name }}"</h2>
 
    {!! Form::model(new App\Task, ['route' => ['projects.tasks.store', $project->slug], 'class'=>'']) !!}
        @include('partials/tform', ['submit_text' => 'Create Task'])
    {!! Form::close() !!}
@endsection