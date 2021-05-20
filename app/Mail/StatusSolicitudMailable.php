<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusSolicitudMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $status, $mensaje;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($status, $mensaje)
    {
        $this->status = $status;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->status == 3) {

            return $this->view('email.status-solicitud')
                    ->attach(public_path('Documentos/Pagare.pdf'))
                    ->subject('Estatus de solicitud');
                    
        } else {

            return $this->view('email.status-solicitud')
                    ->subject('Estatus de solicitud');
        }
        
    }
}
