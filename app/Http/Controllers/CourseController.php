<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCourseRequest;
use App\Models\Course;
use App\Models\Organization;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
    public function createCourse(PostCourseRequest $postCourseRequest): JsonResponse
    {
        // Validate name
        $validated = $postCourseRequest->validated();

        // check if the organization is a valid one
        $organization = Organization::find($validated['org_id']);
        if ($organization == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Invalid organization'
            ], 404);
        }

        // Save the course
        $course = Course::create($validated);
        
        return response()->json([
            'status' => 200,
            'message' => 'Course created successfully',
            'data' => $course
        ], 200);

    }
}
