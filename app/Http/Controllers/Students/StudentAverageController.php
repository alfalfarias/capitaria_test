<?php

namespace App\Http\Controllers\Students;

use App\Models\Students\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentAverageController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query()->with(['evaluations'])->orderBy('id', 'DESC');
        $data = $query->get();

        $students = [];
        foreach ($data as $datum) {
            $student = $datum;
            $evaluations = $student->evaluations()->get();
            $sum = $evaluations->sum('value');
            $count = $evaluations->count();
            $average = null;
            if ($count != 0) {
                $average = $sum / ($count);
                $average = round($average, 2);
            }
            $item = $student->only('id', 'dni', 'name', 'surname');
            $item['average'] = $average;
            $item['is_average_red'] = null;
            if ($average) {
                if ($average < 50) {
                    $item['is_average_red'] = true;
                }
                if ($average >= 50)  {
                    $item['is_average_red'] = false;
                }
            }
            $students[] = $item;
        }
        
        $filter = $request->query('is_average_red');
        if ($filter) {
            if ($filter === 'true') {
                $filter = true;
            }
            if ($filter === 'false') {
                $filter = false;
            }
            $students = collect($students)->where('is_average_red', $filter)->values()->all();
        }
        
        $response = response($students, 200);
        return $response;
    }
}
