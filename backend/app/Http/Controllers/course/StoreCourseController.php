<?php

namespace App\Http\Controllers\course;

use App\Http\Controllers\Controller;
use App\Http\Requests\course\StoreCourseRequest;
use App\Http\Resources\FailedResource;
use App\Http\Resources\SuccessResource;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class StoreCourseController extends Controller
{
    public function __invoke(StoreCourseRequest $request)
    {
        try {
            DB::beginTransaction();
            $course = Course::create([
                "name" => $request->name,
                "schedules" => json_encode($request->schedules),
                "date_start" => $request->date_start,
                "date_end" => $request->date_end,
                "type" => $request->type
            ]);

            if (!$course) {
                return response(FailedResource::make($course), 500);
            }

            DB::commit();
            return response(SuccessResource::make($course), Response::HTTP_CREATED);
        } catch (Exception $e) {
            DB::rollBack();
            return response(FailedResource::make($e->getMessage()), 500);
        }
    }
}
