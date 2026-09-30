<?php

namespace App\Http\Controllers;

use App\Services\EventService;

class EventController extends Controller
{
    protected EventService $eventService;

    public function __construct(?EventService $eventService = null)
    {
        $this->eventService = $eventService ?? new EventService();
    }

    public function index()
    {
        $events = $this->eventService->getEvents();
        return view('events', compact('events'));
    }
}

