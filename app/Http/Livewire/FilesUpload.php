<?php

namespace App\Http\Livewire;

use App\Models\File;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class FilesUpload extends Component
{
    use WithFileUploads;
    public $solicitud;

    public $files = [];

    public function mount(Solicitud $solicitud){
        $this->solicitud = $solicitud;
    }

    public function save(){
        $this->validate([
            'files.*' => 'max:1024', // 1MB Max
        ]);

        foreach ($this->files as $file) {
            $url = $file->store('files');

            $this->solicitud->files()->create([
                'url' => $url
            ]);
        }

        $this->solicitud = $this->solicitud->fresh();
        
        $this->reset('files');

        $this->emitTo('files-download', 'render');

        $this->emit('saved');

    }

    public function delete(File $file){
        Storage::delete($file->url);
        $file->delete();
        $this->solicitud = $this->solicitud->fresh();
        
        $this->emitTo('files-download', 'render');
    }


    public function render()
    {
        return view('livewire.files-upload');
    }
}
