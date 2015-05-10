<?php

// Provide controller methods with object instead of ID
Route::model('tasks', 'App\Task');
Route::model('projects', 'App\Project');

/*$router->model('projects', 'App\Project');
$router->model('tasks', 'App\Task');*/

// Use slugs rather than IDs in URLs
Route::bind('tasks', function($value, $route) {
  return App\Task::whereSlug($value)->first();
});
Route::bind('projects', function($value, $route) {
  return App\Project::whereSlug($value)->first();
});

Route::resource('projects', 'ProjectsController');
Route::resource('projects.tasks', 'TasksController');

