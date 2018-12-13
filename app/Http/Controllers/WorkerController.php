<?php

namespace Infinity_Service\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
use Infinity_Service\Consumer;
use Infinity_Service\Service;
use Infinity_Service\Worker;

class WorkerController extends Controller
{
    public function message_token(Request $request)
    {
        $consumer = Worker::where('email', '=', $request->email)->first();
        $consumer->message_token = $request->message_token;
        $consumer->save();
    }

    public function registerUser(Request $request)
    {
        if (Worker::where('email', '=', $request->email)->count() > 0) {
            return response()->json([
                'error' => 'Email already exist'
            ]);
        }
        $worker = new Worker();
        $worker->email = $request->email;
        $worker->save();
        return $worker;
    }

    public function saveProfile(Request $request)
    {
        $worker = Worker::where('email', '=', $request->email)->first();
        $worker->email = $request->email;
        $worker->fullname = $request->fullname;
        $worker->mobile_number = $request->mobile_number;
        $worker->area = $request->area;
        $worker->service = $request->service_name;

        if ($request->hasFile('photo')) {
            File::delete(public_path('images/' . $worker->image_url));
            $image = $request->file('photo');
            $filename = time() . '.' . $image->guessExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);
            $worker->image_url = $filename;
        }
        $worker->save();
    }

    public function userProfileData($email)
    {
        $worker = Worker::where('email', '=', $email)->get();
        return $worker;
    }

    public function index()
    {
        $services = Service::all();
        $serviceCount = $services->count();

        $workers = Worker::all();
        $workerCount = $workers->count();

        $consumer = Consumer::all();
        $consumerCount = $consumer->count();

        return view('admin.workers.index', compact('serviceCount', 'workers', 'workerCount', 'consumerCount'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
