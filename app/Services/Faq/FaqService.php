<?php

namespace App\Services\Faq;

use App\Models\Faq;

class FaqService
{
    public function getAll()
    {
        return Faq::all();
    }

    public function getById($id)
    {
        return Faq::findOrFail($id);
    }

    public function create(array $data)
    {
        return Faq::create($data);
    }

    public function update(Faq $faq, array $data)
    {
        $faq->update($data);
        return $faq;
    }

    public function delete(Faq $faq)
    {
        return $faq->delete();
    }
}
