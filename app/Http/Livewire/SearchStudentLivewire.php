<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class SearchStudentLivewire extends Component
{

    /* public $search;

    protected $queryString = ['search'=> ['except' => '']];
   
    public $limitPerPage = 10;

    protected $listeners = [
        'post-data' => 'postData'
    ];


    public function getQueryString()
    {
        return [];
    }
   
    public function postData()
    {
        $this->limitPerPage = $this->limitPerPage + 6;
    }

    public function render()
    {
        $posts = User::latest()->paginate($this->limitPerPage);

        if ($this->search !== null) {
            $posts = User::where('name','like', '%' . $this->search . '%')
            ->latest()->paginate($this->limitPerPage);
        }
        $this->emit('postStore');

        return view('livewire.search-student-livewire', ['posts' => $posts]);
    } */

    /* public $query;
    public $contacts;
    public $highlightIndex;
 
    public function mount()
    {
        $this->reset();
    }
 
    public function reset()
    {
        $this->query = '';
        $this->contacts = [];
        $this->highlightIndex = 0;
    }
 
    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->contacts) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }
 
    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->contacts) - 1;
            return;
        }
        $this->highlightIndex--;
    }
 
    public function selectContact()
    {
        $contact = $this->contacts[$this->highlightIndex] ?? null;
        if ($contact) {
            $this->redirect(route('show-contact', $contact['id']));
        }
    }
 
    public function updatedQuery()
    {
        $this->contacts = User::where('name', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }
 
    public function render()
    {
        return view('livewire.search-student-livewire');
    } */

    use WithPagination;

    public $search;
    public $page = 1;

    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    protected $listeners = [
        'studentAdded',
    ];

    public function studentAdded()
    {
        # code...
    }

    public function render()
    {
        $students = User::latest()->paginate(5);

        if ($this->search !== null) {
            $students = User::where('name', 'like', '%' . $this->search . '%')
                            ->latest()
                            ->paginate(5);
        }

        return view('livewire.search-student-livewire',  [
            'students' => $students,
        ]);
    }
}
