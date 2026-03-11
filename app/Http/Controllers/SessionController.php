<?php

namespace App\Http\Controllers;

use App\Models\DhammaSession;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(Request $request)
    {
        $query = DhammaSession::where('is_active', true);

        // Filter by type if provided
        if ($request->has('type') && in_array($request->type, ['dhamma', 'yoga', 'both'])) {
            $query->where('type', $request->type);
        }

        $sessions = $query->orderBy('created_at', 'desc')->get();

        return view('sessions.index', compact('sessions'));
    }

    public function show(DhammaSession $session)
    {
        abort_if(!$session->is_active, 404);

        return view('sessions.show', compact('session'));
    }
}
