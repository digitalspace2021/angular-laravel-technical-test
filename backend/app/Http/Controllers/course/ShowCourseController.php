<?php

namespace App\Http\Controllers\course;

use App\Http\Controllers\Controller;
use App\Http\Resources\FailedResource;
use App\Http\Resources\SuccessResource;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowCourseController extends Controller
{
    public function __invoke(String $id)
    {
        try {
            $course = Course::find($id);

            if (!$course) {
                return response(FailedResource::make($course), Response::HTTP_NOT_FOUND);
            }

            return response(SuccessResource::make($course), Response::HTTP_OK);
        } catch (Exception $e) {
            return response(FailedResource::make($e->getMessage()), 500);
        }
    }
}
