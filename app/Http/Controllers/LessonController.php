<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Transformer\LessonTransformer;
use Illuminate\Http\Request;

class LessonController extends ApiController
{

    protected $lessonTransformer;

    //将字段转换器注入到
    public function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
    }

    public function index()
    {
        $lessons = Lesson::all();
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $this->lessonTransformer->transformCollection($lessons->toArray()),
        ]);

    }

    public function show($id)
    {
        $lesson = Lesson::find($id);

        if (!$lesson) {
            return $this->responseNotFound();
        }


        return response()->json([
            'status' => 'success',
            'data' => $this->lessonTransformer->transform($lesson),
        ]);
    }


}
