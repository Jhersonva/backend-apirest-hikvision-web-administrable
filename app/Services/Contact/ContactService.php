<?php

namespace App\Services\Contact;

use App\Models\Contact;

class ContactService
{
    public function getContact()
    {
        return Contact::first(); 
    }

    public function updateContact(array $data)
    {
        $contact = Contact::first();

        // Si no existe, lo creamos
        if (!$contact) {
            $contact = Contact::create($data);
        } else {
            $contact->update($data);
        }

        return $contact;
    }
}