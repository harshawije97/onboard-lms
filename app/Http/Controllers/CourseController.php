<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCourseRequest;
use App\Http\Requests\PostMediaContentRequest;
use App\Models\ContentMedia;
use App\Models\Course;
use App\Models\CourseContent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function createCourse(PostCourseRequest $request): JsonResponse
    {
        // Validate name
        $validatedData = $request->validated();
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

    public function createCourseContent(Request $request)
    {
        // validate the request
        $validated = $request->validate([
            'total_hours' => ['required', 'integer'],
            'content_info' => ['required', 'string'],
            'course_id' => ['required', 'string', 'exists:courses,id']
        ]);
        // save the course content
        $courseContent = CourseContent::create($validated);
        // return the response in json
        return response()->json([
            'status' => 200,
            'message' => 'Course content created successfully!',
            'data' => $courseContent
        ], 200);
    }

    public function createCourseMediaContent(PostMediaContentRequest $request)
    {
        // validated
        $validateData = $request->validated();
        // save the course content
        $contentMedia = ContentMedia::create($validateData);
        // return the response in json
        return response()->json([
            'status' => 200,
            'message' => 'Course content created successfully!',
            'data' => $contentMedia
        ], 200);
    }
}
