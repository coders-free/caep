<?php

namespace App\Observers;

use App\Models\Imponente;

class ImponenteObserver
{
    /**
     * Handle the Imponente "created" event.
     *
     * @param  \App\Models\Imponente  $imponente
     * @return void
     */
    public function created(Imponente $imponente)
    {
        //
    }

    /**
     * Handle the Imponente "updated" event.
     *
     * @param  \App\Models\Imponente  $imponente
     * @return void
     */
    public function updated(Imponente $imponente)
    {
        //
    }

    /**
     * Handle the Imponente "deleted" event.
     *
     * @param  \App\Models\Imponente  $imponente
     * @return void
     */
    public function deleted(Imponente $imponente)
    {
        //
    }

    /**
     * Handle the Imponente "restored" event.
     *
     * @param  \App\Models\Imponente  $imponente
     * @return void
     */
    public function restored(Imponente $imponente)
    {
        //
    }

    /**
     * Handle the Imponente "force deleted" event.
     *
     * @param  \App\Models\Imponente  $imponente
     * @return void
     */
    public function forceDeleted(Imponente $imponente)
    {
        //
    }
}
