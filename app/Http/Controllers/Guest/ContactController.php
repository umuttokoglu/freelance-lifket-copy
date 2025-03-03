<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('guest.contact');
    }

    public function store(StoreContactRequest $request): RedirectResponse
    {
        Contact::query()->create($request->validated());

        session()->flash('message', 'Mesajınız başarıyla iletildi. En kısa sürede size dönüş yapılacaktır.');

        return response()->redirectToRoute('guest.iletisim.index');
    }
}
