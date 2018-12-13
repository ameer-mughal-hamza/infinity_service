<?php

namespace Infinity_Service\Http\Controllers;

use Illuminate\Http\Request;
use Infinity_Service\Service;
use Infinity_Service\Subservice;

class SubserviceController extends Controller
{
    public function api_index($title)
    {
        $array = array();
        $services = Service::where('service_name', '=', $title)->get();
        foreach ($services as $service) {
            foreach ($service->subservices as $subservice) {
                $array[] = $subservice;
//            $array[] = $service;
            }
        }
        return $array;
    }

    public function index()
    {
        return 'index';
    }

    public function subservice_detail($subservice_name)
    {
        $s = Subservice::where('title', $subservice_name)->first();
        return $s;
    }


    public function create()
    {
        $services = Service::all();
        $serviceCount = $services->count();
        return view('admin.sub_services.create', compact('serviceCount'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|min:3|unique:subservices',
            'description' => 'required|min:200',
            'price' => 'required',
        ]);

        $services = Service::all();
        $serviceCount = $services->count();

        $sub_service = new Subservice();
        $sub_service->title = $request->title;
        $sub_service->description = $request->description;
        $sub_service->price = $request->price;
        $sub_service->save();
        return view('admin.sub_services.create', compact('serviceCount'));
    }

    public function show(Subservice $subService)
    {
        return 'show';
    }

    public function edit($id)
    {
        return 'edit';
    }

    public function update(Request $request)
    {
        return 'update';
    }


    public function destroy($id)
    {
        $sub_service = Subservice::destroy($id);
        return redirect()->route('service.index');
    }

    public function view_all_subservices()
    {
        $services = Service::all();
        $serviceCount = $services->count();
        $subservices = Subservice::all();
        return view('admin.sub_services.all_subservices', compact('subservices', 'serviceCount'));
    }

    public function getAllSubservices()
    {
        return Subservice::all();
    }
}
