<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Http\Resources\SuccessResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllStudentController extends Controller
{
    public function __invoke(Request $request)
    {
        $students = Student::select('id', 'name', 'last_name', 'email', 'identification', 'age')
            ->when($request->has('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%')
                    ->orWhere("email", 'like', '%' . $request->search . '%')
                    ->orWhere("identification", 'like', '%' . $request->search . '%');
            })
            ->paginate($request->per_page ?? 5);


        return response(SuccessResource::make($students), Response::HTTP_OK);
    }
}
