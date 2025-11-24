<?php

namespace App\Http\Controllers;

use App\Models\CompanyEvent;
use Illuminate\Http\Request;

class CompanyEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('events.index');
    }

    public function fetch()
    {
        return \App\Models\CompanyEvent::all()->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->judul,
                'start' => $event->tanggal_mulai,
                'end' => $event->tanggal_selesai,
                'color' => $event->warna ?? '#6366f1',
            ];
        });
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'nullable|string|max:255',
            'warna' => 'nullable|string|max:7',
        ]);

        CompanyEvent::create($request->all());

        return response()->json(['success' => true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyEvent $companyEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyEvent $companyEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyEvent $companyEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyEvent $companyEvent)
    {
        //
    }
}
