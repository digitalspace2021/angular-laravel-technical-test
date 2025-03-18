<?php

namespace App\Http\Controllers\course;

use App\Http\Controllers\Controller;
use App\Http\Resources\SuccessResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllCourseController extends Controller
{
    public function __invoke(Request $request)
    {
        $courses = Course::select('name', 'schedules', 'date_start', 'date_end', 'type')
            ->when($request->has('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('date_start', 'like', '%' . $request->search . '%')
                    ->orWhere("date_end", 'like', '%' . $request->search . '%')
                    ->orWhere("type", 'like', '%' . $request->search . '%');
            })
            ->paginate($request->per_page ?? 10);


        return response(SuccessResource::make($courses), Response::HTTP_OK);
    }
}
