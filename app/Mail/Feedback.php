<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Feedback extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $phone, $title, $content)
    {
        //
        $this->email = $email;
        $this->phone = $phone;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.feedback')
            ->subject('New Feedback')->with([
                'email' => $this->email,
                'phone' => $this->phone,
                'title' => $this->title,
                'content' => $this->content,
            ]);
    }
}
