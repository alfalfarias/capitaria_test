<?php

namespace App\Http\Controllers\Courses;

use App\Models\Courses\Course;
use App\Services\Courses\CreateCourse\Command as CreateCourseCommand;
use App\Services\Courses\UpdateCourse\Command as UpdateCourseCommand;
use App\Services\Courses\DeleteCourse\Command as DeleteCourseCommand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Course::query()->with(['evaluations', 'teacher', 'students'])->orderBy('id', 'DESC');
        $data = $query->get();
        $response = response($data, 200);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_data = $request->all();
        $command = CreateCourseCommand::run($request_data);
        $data = $command;
      
        $response = response($data, 201);
        return $response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request_data = $request->all();
        $request_data['id'] = $id;
        $command = UpdateCourseCommand::run($request_data);
        $data = $command;
      
        $response = response($data, 200);
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request_data = ['id' => $id];
        $command = DeleteCourseCommand::run($request_data);
        $data = [];
      
        $response = response($data, 204);
        return $response;
    }
}
