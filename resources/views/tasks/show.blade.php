@extends('app')
 
@section('content')
    <h2>{{ $project->name }}</h2>
    <h4>{{ $task->name }}</h4>
      <div>{{ $task->completed }}</div>
      <div>{{ $task->description }}</div>

    <p>
        <a href="{{ route('projects.show', [$project->slug]) }}">Back</a>
        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.destroy', $project->slug, $task->slug))) !!}
            (
                {!! link_to_route('projects.tasks.edit', 'Edit', array($project->slug, $task->slug), array('class' => 'btn btn-info')) !!},

                {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
            )
        {!! Form::close() !!}
    </p>
@endsection