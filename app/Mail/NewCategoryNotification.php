<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewCategoryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function build()
    {
        return $this->subject('New Category Created')
                    ->view('emails.new-category-notification')
                    ->with([
                        'categoryName' => $this->category->name,
                        'colorHex' => $this->category->hex_code,
                    ]);
    }
}
