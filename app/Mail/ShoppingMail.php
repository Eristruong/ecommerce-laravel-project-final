<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Bill;

class ShoppingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $bills;
    public $billdetails;
    public $date;
    public $name;
    public $phonenumber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bills, $billdetails, $date, $name, $phonenumber)
    {
        $this->bills = $bills;
        $this->billdetails = $billdetails;
        $this->date = $date;
        $this->name = $name;
        $this->phonenumber = $phonenumber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('maill');
    }
}
