<?php

namespace Infinity_Service\Http\Controllers;

use Illuminate\Http\Request;
use Infinity_Service\Consumer;
use Infinity_Service\Service;
use Infinity_Service\Subservice;
use Infinity_Service\Worker;

class ServiceController extends Controller
{
    /*-------------API Methods--------------*/
    public function api_index()
    {
        $services = Service::all();
        foreach ($services as $key => $s) {
            $services[$key]["count"] = $s->subservices()->count();
        }
        return $services;
    }

    public function getAllServices()
    {
        $services = Service::all();
        $serviceCount = $services->count();
        return view('admin.services.all_services', compact('services', 'serviceCount'));
    }

    public function serviceDetail(Request $request)
    {
        $services = Service::with('subservices')->find($request->id);
//        dd($services->toArray());
        return $services;
    }

    public function index()
    {
        $sub_services = Subservice::take(5)->get();
        $services = Service::where('status', '1')->take(5)->get();
        $serviceCount = $services->count();

        $workers = Worker::all();
        $workerCount = $workers->count();

        $consumer = Consumer::all();
        $consumerCount = $consumer->count();
        return view('admin.services.index', compact('sub_services', 'services', 'serviceCount', 'workerCount', 'consumerCount'));
    }

    public function create()
    {
        $sub_services = Subservice::all();
        $services = Service::all();
        $serviceCount = $services->count();
        return view('admin.services.create', compact('sub_services', 'serviceCount'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'description' => 'required|min:200'
        ]);
        $service = new Service();
        $service->service_name = $request->title;
        $service->description = $request->description;
        $service->status = '1';
        $service->save();
        $service->subservices()->attach($request->service_subtype);

        $sub_services = Subservice::all();
        $services = Service::all();
        $seviceCount = $services->count();
        return view('admin.services.index', compact('sub_services', 'services', 'seviceCount'));
    }

    public function edit($id)
    {
        $services = Service::all();
        $sub_services = Subservice::all();

        $serviceCount = $services->count();
        $service = Service::find($id);

        $workers = Worker::all();
        $workerCount = $workers->count();

        $consumer = Consumer::all();
        $consumerCount = $consumer->count();

        return view('admin.services.edit', compact('service', 'sub_services', 'serviceCount', 'workerCount', 'consumerCount'));
    }

    public function update(Request $request)
    {
//        dd($request->all());
        $service = Service::where('id', '=', $request->id)->first();
        $service->service_name = $request->title;
        $service->description = $request->description;
        $service->save();
        $service->subservices()->sync($request->service_subtype);

        $sub_services = Subservice::all();
        $services = Service::all();
        $serviceCount = $services->count();
        return redirect()->route('service.index', compact('sub_services', 'services', 'serviceCount'));
//        return redirect()->back();
    }
}
