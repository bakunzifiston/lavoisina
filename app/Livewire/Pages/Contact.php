<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class Contact extends Component
{
    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'subject' => 'required|min:5',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();

        // Send email
        Mail::raw($this->message, function ($message) {
            $message->to('hotel@example.com')
                   ->subject("[Contact Form] {$this->subject}")
                   ->from($this->email, $this->name);
        });

        session()->flash('success', 'Thank you for your message. We will get back to you soon!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.contact')->layout('layouts.guest');
    }
}
