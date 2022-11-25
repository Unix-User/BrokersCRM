<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function index()
    {
        return Inertia::render('Dashboard/Index', [
            'filters' => Request::all('search', 'trashed'),
            'contacts' => User::all()->first()->account->contacts()
            ->with('organization')
            ->orderByName()
            ->filter(Request::only('search', 'trashed'))
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($contact) => [
                'id' => $contact->id,
                'name' => $contact->name,
                'phone' => $contact->phone,
                'city' => $contact->city,
                'deleted_at' => $contact->deleted_at,
                'organization' => $contact->organization ? $contact->organization->only('name') : null,
            ]),
        ]);
    }

    public function plans()
    {
        return Inertia::render('Dashboard/Plans');
    }
}
