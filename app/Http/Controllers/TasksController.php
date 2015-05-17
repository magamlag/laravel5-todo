<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Input, Redirect;
use App\Project;
use App\Task;

use Illuminate\Http\Request;

/**
 * Class TasksController
 * @package App\Http\Controllers
 */
class TasksController extends Controller {

	/**
	 * Display a listing of the resource.
	 * @param Project $project
	 * @return Response
	 */
	public function index( Project $project ) {
		return view( 'projects.show', compact( 'project' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 * @param Project $project
	 * @return Response
	 */
	public function create( Project $project ) {
		return view( 'tasks.create', compact( 'project' ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Project $project
	 * @param Request $request
	 * @return Response
	 */
	public function store( Project $project, Request $request ) {
		$v = \Validator::make( $request->all(), Fat::$rules );

		if ( $v->fails() )
			return redirect()->back()->withErrors( $v->errors() );

		$input               = $request->all();
		$input['project_id'] = $project->id;
		Task::create( $input );

		return Redirect::route( 'projects.show', $project->slug )->with( 'message', 'Task created.' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Project $project
	 * @param  Task $task
	 * @return Response
	 */
	public function show( Project $project, Task $task ) {
		return view( 'projects.show', compact( 'project', 'task' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Project $project
	 * @param  Task $task
	 * @return Response
	 */
	public function edit( Project $project, Task $task ) {
		return view( 'tasks.edit', compact( 'project', 'task' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Project $project
	 * @param  Request $request
	 * @param  Task $task
	 * @return Response
	 */
	public function update( Project $project, Request $request, Task $task )
	{
		$v = \Validator::make( $request->all(), Task::$rules );

		if ( $v->fails() )
			return redirect()->back()->withErrors( $v->errors() );

		$input               = $request->all();
		$input['project_id'] = $project->id;
		Task::create( $input );

		$input = array_except( Input::all(), '_method' );
		$task->update( $input );

		return Redirect::route( 'projects.tasks.show', [ $project->slug, $task->slug ] )->with( 'message', 'Task updated.' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Project $project
	 * @param  Task $task
	 * @return Response
	 */
	public function destroy( Project $project, Task $task ) {
		$task->delete();
		return Redirect::route( 'projects.show', $project->slug )->with( 'message', 'Task deleted.' );
	}

}
