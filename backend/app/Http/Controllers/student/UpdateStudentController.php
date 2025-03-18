<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Http\Requests\student\UpdateStudentRequest;
use App\Http\Resources\FailedResource;
use App\Http\Resources\SuccessResource;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class UpdateStudentController extends Controller
{
    public function __invoke(UpdateStudentRequest $request, String $id)
    {
        try {
            $student = Student::find($id);

            if (!$student) {
                return response(FailedResource::make($student), Response::HTTP_NOT_FOUND);
            }
            DB::beginTransaction();

            $student->update($request->request->all());

            DB::commit();
            return response(SuccessResource::make($student), Response::HTTP_CREATED);
        } catch (Exception $e) {
            DB::rollBack();
            return response(FailedResource::make($e->getMessage()), 500);
        }
    }
}
