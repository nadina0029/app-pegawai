<?php

namespace App\Http\Controllers;

use App\Models\CompanyEvent;
use Illuminate\Http\Request;

class CompanyEventController extends Controller
{
    // Halaman Index (Mengembalikan View)
    public function index()
    {
        return view('company_events.index');
    }

    // FUNGSI KHUSUS UNTUK FULLCALENDAR API (Mengembalikan JSON)
    public function fetchEvents()
    {
        // 1. Ambil data
        $data = CompanyEvent::all();

        // 2. Mapping dan Formatting
        $events = $data->map(function($event) {
            
            // PERBAIKAN: Mengandalkan $casts di Model, HAPUS parse() yang konflik
            // Data sudah menjadi objek Carbon (berkat $casts di Model)
            $start = ($event->tanggal_mulai) 
                ? $event->tanggal_mulai->format('Y-m-d\TH:i:s') 
                : null;
            $end   = ($event->tanggal_selesai) 
                ? $event->tanggal_selesai->format('Y-m-d\TH:i:s') 
                : null;

            return [
                'id' => $event->id,
                'title' => $event->judul,
                'start' => $start,
                'end'   => $end,
                'color' => $event->warna,
                'lokasi' => $event->lokasi,
                'deskripsi' => $event->deskripsi,
            ];
        });

        return response()->json($events);
    }
    
    // FUNGSI LAINNYA (dibiarkan sama)
    public function create(Request $request)
    {
        $date = $request->query('date');
        return view('company_events.create', compact('date'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        CompanyEvent::create($request->all());

        return redirect()->route('company-events.index')->with('success', 'Agenda berhasil ditambahkan');
    }

    public function show($id)
    {
        $companyEvent = CompanyEvent::findOrFail($id);
        return view('company_events.show', compact('companyEvent'));
    }

    public function edit($id)
    {
        $companyEvent = CompanyEvent::findOrFail($id);
        return view('company_events.edit', compact('companyEvent'));
    }

    public function update(Request $request, $id)
    {
        $companyEvent = CompanyEvent::findOrFail($id);
        $companyEvent->update($request->all());
        return redirect()->route('company-events.index')->with('success', 'Agenda berhasil diperbarui');
    }

    public function destroy($id)
    {
        $companyEvent = CompanyEvent::findOrFail($id);
        $companyEvent->delete();
        return redirect()->route('company-events.index')->with('success', 'Agenda berhasil dihapus');
    }
}