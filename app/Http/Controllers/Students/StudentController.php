<?php

namespace App\Http\Controllers\Students;

use App\Models\Students\Student;
use App\Services\Students\CreateStudent\Command as CreateStudentCommand;
use App\Services\Students\UpdateStudent\Command as UpdateStudentCommand;
use App\Services\Students\DeleteStudent\Command as DeleteStudentCommand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Student::query()->with(['courses'])->orderBy('id', 'DESC');
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
        $command = CreateStudentCommand::run($request_data);
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
        $command = UpdateStudentCommand::run($request_data);
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
        $command = DeleteStudentCommand::run($request_data);
        $data = [];
      
        $response = response($data, 204);
        return $response;
    }
}
