<?php

namespace App\Http\Controllers\Teachers;

use App\Models\Teachers\Teacher;
use App\Services\Teachers\CreateTeacher\Command as CreateTeacherCommand;
use App\Services\Teachers\UpdateTeacher\Command as UpdateTeacherCommand;
use App\Services\Teachers\DeleteTeacher\Command as DeleteTeacherCommand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Teacher::query()->with(['courses'])->orderBy('id', 'DESC');
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
        $command = CreateTeacherCommand::run($request_data);
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
        $command = UpdateTeacherCommand::run($request_data);
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
        $command = DeleteTeacherCommand::run($request_data);
        $data = [];
      
        $response = response($data, 204);
        return $response;
    }
}
