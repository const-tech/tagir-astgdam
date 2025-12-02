<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendPriceQuotationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $file_path,
        $files,
        $file1,
        $file2,
        $file3,
        $file4,
        $file5;
    /**
     * Create a new message instance.
     */
    public function __construct($user, $file_path, $files)
    {
        $this->user = $user;
        $this->file_path = $file_path;
        $this->files = $files;
        $this->file1 = $files[0];
        $this->file2 = $files[1];
        $this->file3 = $files[2];
        $this->file4 = $files[3];
        $this->file5 = $files[4];
    }

    public function build()
    {
        return $this->subject('عرض سعر')
            ->view('emails.send_price_quotation_mail') // Email content
            ->attach($this->file_path, [
                'as' => 'عرض-سعر.pdf',
                'mime' => 'application/pdf',
            ])
            ->attach($this->file1, [
                'as' => 'CR EOM.pdf',
                'mime' => 'application/pdf',
            ])
            ->attach($this->file2, [
                'as' => 'emaar el mosanad bank details.pdf',
                'mime' => 'application/pdf',
            ])
            ->attach($this->file3, [
                'as' => 'National address.pdf',
                'mime' => 'application/pdf',
            ])
            ->attach($this->file4, [
                'as' => 'VAT EOM.pdf',
                'mime' => 'application/pdf',
            ])
            ->attach($this->file5, [
                'as' => 'Zakat certificate.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}