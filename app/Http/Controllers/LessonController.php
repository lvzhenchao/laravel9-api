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
        $this->middleware('auth.basic', ['only' => ['store', 'update']]);
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

    public function store(Request $request)
    {
        if (!$request->get('title') || !$request->get('body')) {
            return $this->setStatusCode(422)->responseError('验证失败');
        }

        Lesson::create($request->all());
        return $this->setStatusCode(201)->response([
            'status' => 'success',
            'message' => 'lesson created'
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
