<?php

namespace App\Livewire\Components;

use Livewire\Component;

class NewsletterSignup extends Component
{
    public $email = '';
    
    public function subscribe()
    {
        $this->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        // Store the email in the newsletter_subscribers table
        // You'll need to create this table and model
        \DB::table('newsletter_subscribers')->insert([
            'email' => $this->email,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->reset('email');
        session()->flash('success', 'Thank you for subscribing to our newsletter!');
    }

    public function render()
    {
        return view('livewire.components.newsletter-signup');
    }
}
