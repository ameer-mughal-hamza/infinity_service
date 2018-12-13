<?php

namespace Infinity_Service\Http\Controllers;

use Infinity_Service\Consumer;
use Infinity_Service\Service;
use Infinity_Service\Worker;

class AdminController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $serviceCount = $services->count();

        $workers = Worker::all();
        $workerCount = $workers->count();

        $consumer = Consumer::all();
        $consumerCount = $consumer->count();

        return view('admin.admin-home', compact('serviceCount', 'workerCount', 'consumerCount'));
    }
}
