<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $this->transformCollection($lessons),
        ]);

    }

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => $this->transform($lesson),
        ]);
    }


    public function transformCollection($lessons)
    {
        return array_map([$this, 'transform'], $lessons->toArray());
    }

    public function transform($lesson)
    {
        return [
            'title'   => $lesson['title'],
            'content' => $lesson['body'],
            'is_free' => (boolean) $lesson['free'],
        ];
    }
}
