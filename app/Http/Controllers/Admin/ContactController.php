<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $messages = Contact::query()->latest()->paginate(10);

        return view('admin.contact.index', compact('messages'));
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        session()->flash('message', 'Mesaj kaydı başarıyla silindi.');

        return response()->redirectToRoute('admin.contact.index');
    }
}
