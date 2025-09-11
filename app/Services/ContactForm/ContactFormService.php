<?php

namespace App\Services\ContactForm;

use App\Models\ContactForm;

class ContactFormService
{
    public function create(array $data): ContactForm
    {
        return ContactForm::create($data);
    }

    public function getAll()
    {
        return ContactForm::latest()->get();
    }

    public function getById(int $id): ?ContactForm
    {
        return ContactForm::find($id);
    }

    public function delete(int $id): bool
    {
        $contact = ContactForm::find($id);
        if ($contact) {
            return $contact->delete();
        }
        return false;
    }
}