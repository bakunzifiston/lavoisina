<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Validator;

class NewsletterSignup extends Component
{
    public $email = '';
    public $successMessage = '';

    public function subscribe()
    {
        $validated = $this->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        NewsletterSubscriber::create([
            'email' => $this->email
        ]);

        $this->email = '';
        $this->successMessage = 'Thank you for subscribing to our newsletter!';
    }

    public function render()
    {
        return view('livewire.newsletter-signup');
    }
} 