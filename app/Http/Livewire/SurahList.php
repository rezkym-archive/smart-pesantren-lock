<?php

namespace App\Http\Livewire;

use Livewire\Component;

/* Model */
use App\Models\Surah;
use App\Models\User;

class SurahList extends Component
{
    public $ottPlatform = '';
    public $surah;

    public static function getSurahName()
    {
        return Surah::get();
    }

    public function render()
    {
        
        $this->surah = self::getSurahName();
        return view('livewire.surah-list');
    }
}
