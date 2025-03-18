<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Http\Requests\student\StoreStudentRequest;
use App\Http\Resources\FailedResource;
use App\Http\Resources\SuccessResource;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class StoreStudentController extends Controller
{
    public function __invoke(StoreStudentRequest $request)
    {
        try {
            DB::beginTransaction();
            $student = Student::create($request->request->all());

            if (!$student) {
                return response(FailedResource::make($student), 500);
            }

            DB::commit();
            return response(SuccessResource::make($student), Response::HTTP_CREATED);
        } catch (Exception $e) {
            DB::rollBack();
            return response(FailedResource::make($e->getMessage()), 500);
        }
    }
}
