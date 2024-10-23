<?php

namespace App\Mail;

use App\Models\BulletinBoardEntry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BulletinBoardNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $bulletinEntry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(BulletinBoardEntry $bulletinEntry)
    {
        $this->bulletinEntry = $bulletinEntry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.bulletinBoardNotification')
                    ->subject('New Bulletin Board Entry: ' . $this->bulletinEntry->title)
                    ->with([
                        'title' => $this->bulletinEntry->title,
                        'description' => $this->bulletinEntry->description,
                        'author' => $this->bulletinEntry->user->fname . ' ' . $this->bulletinEntry->user->lname,
                        'created_at' => $this->bulletinEntry->created_at->format('F j, Y, g:i a'),
                    ]);
    }
}
