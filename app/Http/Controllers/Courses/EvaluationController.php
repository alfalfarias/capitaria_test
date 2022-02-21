<?php

namespace App\Http\Controllers\Courses;

use App\Models\Courses\Evaluation;
use App\Services\Courses\CreateEvaluation\Command as CreateEvaluationCommand;
use App\Services\Courses\UpdateEvaluation\Command as UpdateEvaluationCommand;
use App\Services\Courses\DeleteEvaluation\Command as DeleteEvaluationCommand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->query('course_id');

        $query = Evaluation::query()->with(['course'])->orderBy('id', 'DESC');
        if ($filter) {
            $query->where('course_id', $filter);
        }
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
        $command = CreateEvaluationCommand::run($request_data);
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
        $command = UpdateEvaluationCommand::run($request_data);
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
        $command = DeleteEvaluationCommand::run($request_data);
        $data = [];
      
        $response = response($data, 204);
        return $response;
    }
}
