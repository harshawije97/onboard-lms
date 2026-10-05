<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCourseRequest;
use App\Models\Course;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
    public function createCourse(PostCourseRequest $postCourseRequest): JsonResponse
    {
        // Validate name
        $validatedData = $postCourseRequest->validated();
        // Save the course
        $course = Course::create($validatedData);

        return response()->json([
            'status' => 201,
            'message' => 'Course created successfully',
            'data' => $course
        ], 201);

    }

    public function getCourse(string $id)
    {
        //TODO::Check if the user has the authorization to get the course information
        $course = Course::findOrFail($id);
        return response()->json([
            'status' => 200,
            'message' => 'Course fetched',
            'data' => $course
        ], 200);
    }
}
