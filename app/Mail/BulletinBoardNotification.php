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
     * @param BulletinBoardEntry $bulletinEntry
     */
    public function __construct(BulletinBoardEntry $bulletinEntry)
    {
        // Ensure we have the entry data
        if (!$bulletinEntry) {
            \Log::error('BulletinBoardNotification: Bulletin entry is missing.');
        }

        $this->bulletinEntry = $bulletinEntry;

        // Log entry creation for debugging
        \Log::info('BulletinBoardNotification: Entry created.', [
            'entry_id' => $this->bulletinEntry->id ?? 'N/A',
            'title' => $this->bulletinEntry->title ?? 'N/A',
            'author' => $this->bulletinEntry->user->fname ?? 'N/A',
        ]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if (!$this->bulletinEntry || !$this->bulletinEntry->user) {
            \Log::error('BulletinBoardNotification: Missing bulletin entry or user.');
        } else {
            \Log::info('Building Bulletin Notification Email', [
                'title' => $this->bulletinEntry->title,
                'author' => $this->bulletinEntry->user->fname . ' ' . $this->bulletinEntry->user->lname,
                'email' => $this->bulletinEntry->user->email ?? 'No Email',
            ]);
        }

        // Ensure the email template and data are properly set up
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
