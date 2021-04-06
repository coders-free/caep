<?php

namespace App\Http\Livewire;

use App\Models\File;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class FilesDownload extends Component
{

    public $solicitud;

    protected $listeners = ['render'];

    public function mount(Solicitud $solicitud){
        $this->solicitud = $solicitud;
    }

    public function export(File $file){
        return Storage::download($file->url);
    }

    public function render()
    {
        return view('livewire.files-download');
    }
}
