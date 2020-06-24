<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use App\Http\Resources\RecordResource;
use App\Qr_code;
use App\Record;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    /**
     * Student registration
     *
     * @param Request $r
     * @return JsonResponse
     */
    public function register(Request $r) {
        $validate = Validator::make($r->all(), [
            'index' => 'required|numeric|unique:students,index_number,digits:7',
            'name' =>  ['required', 'string'],
            'password' => ['required', 'string'],
            'email'    => ['required', 'email', 'unique:users'],
        ]);

        if($validate->fails())
            return $this->results(['message' => $validate->getMessageBag()->first(), 'data' => null], Response::HTTP_UNPROCESSABLE_ENTITY);


        $user = User::create([
            'name' => $r['name'],
            'password' => Hash::make($r['password']),
            'email'    => $r['email'],
            'role_id'  => '1',

        ]);

        $user->student()->create([
            'index_number' => $r['index']
        ]);

        Auth::login($user);

        return $this->results(['message' => 'registration success', 'data' => new AuthResource($user)]);
    }


    /**
     * Student login
     *
     * @param Request $r
     * @return JsonResponse
     */

    public function login(Request $r) {
        $validator = Validator::make($r->all(), [
            'email' => ['required'],
            'password' => ['required']
        ]);

        if($validator->fails()) {
            return $this->results(['message' => $validator->getMessageBag()->first(), 'data' => null], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if (Auth::attempt(['email' => $r['email'], 'password' => $r['password']])) {
            return $this->results(['message' => 'login success', 'data' => new AuthResource(auth()->user())]);
        }

        return $this->results(['message' => 'invalid credentials', 'data' => null], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * record attendance for student
     *
     * @param Request $r
     * @return JsonResponse
     */
    public function recordAttendance(Request $r) {
        $validator = Validator::make($r->all(), [
            'qr_code' => ['required', 'exists:qr_codes,id']
        ]);

        if($validator->fails()) {
            return $this->results(['message' => $validator->getMessageBag()->first(), 'data' => null], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $qr_code = Qr_code::find($r['qr_code']);

        if (!$qr_code)
            return $this->results(['message' => 'qr code not found', 'data' => null], Response::HTTP_NOT_FOUND);

        // return () ? "true" :"false";

        // return date("H:i", strtotime($qr_code->time));

        if($qr_code->created_at->toDateString() == now()->toDateString()) {

            if(now()->toTimeString() <= date("H:i", strtotime($qr_code->time))) {

                $student = auth()->user()->student;

                if (Record::where(['student_id' => $student->id, 'qr_code_id' => $qr_code->id])->exists()) {
                    return $this->results(['message' => 'attendance already taken', 'data' => null]);
                }

                $student->records()->create([
                    'qr_code_id' => $r['qr_code'],
                    'recorded' => 1
                ]);

                return $this->results(['message' => 'attendance recorded', 'data' => null]);
            }
        }


        return $this->results(['message' => 'access denied', 'data' => null], Response::HTTP_FORBIDDEN);




    }

    /**
     * Get all recorded attendances belonging to user
     *
     * @return JsonResponse
     */
    public function getAllAttendances() {
        return $this->results([
            'message' => 'all attendances',
            'data' => RecordResource::collection(auth()->user()->student->records)]);
    }
}
