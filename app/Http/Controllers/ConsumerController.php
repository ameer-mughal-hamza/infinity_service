<?php

namespace Infinity_Service\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
use Infinity_Service\Consumer;
use Infinity_Service\Service;
use Infinity_Service\Worker;

class ConsumerController extends Controller
{
    public function sendNotificationsToAll(Request $request)
    {
        $workers = Worker::where('service', $request->title)->get();
        return $workers;
    }

    public function message_token(Request $request)
    {
        $consumer = Consumer::where('email', '=', $request->email)->first();
        $consumer->message_token = $request->message_token;
        $consumer->save();
    }

    public function registerUser(Request $request)
    {
        if (Consumer::where('email', '=', $request->email)->count() > 0) {
            return '{
                "error" : "Email already exist"
            }';
        }
        $consumer = new Consumer();
        $consumer->email = $request->email;
        $consumer->save();
        return $consumer;
    }

    public function userProfileData($email)
    {
        $consumer = Consumer::where('email', '=', $email)->get();
        return $consumer;
    }

    public function saveProfile(Request $request)
    {
        $consumer = Consumer::where('email', '=', $request->email)->first();
        $consumer->email = $request->email;
        $consumer->fullname = $request->fullname;
        $consumer->mobile_number = $request->mobile_number;
        $consumer->area = $request->area;
        if ($request->hasFile('photo')) {
            // Delete previous image...
            File::delete(public_path('images/' . $consumer->image_url));
            // Save new image
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);
            $consumer->image_url = $filename;
        }
        $consumer->save();
    }

    public function index()
    {
        $consumers = Consumer::all();

        $services = Service::all();
        $serviceCount = $services->count();

        $workers = Worker::all();
        $workerCount = $workers->count();

        $consumer = Consumer::all();
        $consumerCount = $consumer->count();

        return view('admin.consumer.index', compact('consumers', 'serviceCount', 'workerCount', 'consumerCount'));
    }

    // Get Server key...
    public function getServerKey()
    {
        $key = DB::table('server')->where('id', 1)->first();
        return $key->server_key;
    }
}
