<?php

namespace App\Livewire;

use App\Mail\Contact as MailContact;
use App\Models\Contact as ModelsContact;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class Contact extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;
    public $alert;

    public function submit() {
       
        $contact = new ModelsContact;
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->message = $this->message;
        $contact->status = 'unread';
        $contact->save();

        $admin_email = config('mail.admin_email');
        Mail::to( $admin_email )->send(new MailContact( $contact ));
        
        $this->reset();
        $this->alert = 'success';
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
