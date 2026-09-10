<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        try {
            $events = Event::whereNull('deleted_at')->orderBy('starts_at', 'asc')->get();
        } catch (\Throwable $e) {
<<<<<<< HEAD
            Log::error('Gagal mengambil events dari pgsql_acmi: ' . $e->getMessage());
            $events = collect();
        }
=======
            \Illuminate\Support\Facades\Log::error('Gagal mengambil events dari database pgsql_acmi: ' . $e->getMessage());
            $events = collect();
        }

>>>>>>> b76ac91 (revision from pak nanu)
        return view('events', compact('events'));
    }
}
