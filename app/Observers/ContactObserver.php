<?php

namespace App\Observers;

use App\Mail\ReplayContactMail;
use App\Mail\SendContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactObserver
{
    /**
     * Handle the Contact "created" event.
     */
    public function created(Contact $contact): void
    {
        Mail::to('yousefsaleh.888.it@gmail.com')->send(new SendContactMail($contact->message, $contact->name, $contact->subject));
        Mail::to($contact->email)->send(new ReplayContactMail($contact->name));
    }

    /**
     * Handle the Contact "updated" event.
     */
    public function updated(Contact $contact): void
    {
        //
    }

    /**
     * Handle the Contact "deleted" event.
     */
    public function deleted(Contact $contact): void
    {
        //
    }

    /**
     * Handle the Contact "restored" event.
     */
    public function restored(Contact $contact): void
    {
        //
    }

    /**
     * Handle the Contact "force deleted" event.
     */
    public function forceDeleted(Contact $contact): void
    {
        //
    }
}
