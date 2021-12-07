<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use PragmaRX\Countries\Package\Countries;

class Profile extends Component
{
    public $edit = false;

    public $first_name;
    public $last_name;
    public $gender;
    public $phone;
    public $username;
    public $country;
    public $state;
    public $dob;
    public $queryString = [
        'edit' => [
            'except' => false
        ]
    ];

    public function mount()
    {
        $this->first_name = auth()->user()->first_name;
        $this->last_name = auth()->user()->last_name;
        $this->gender = auth()->user()->gender;
        $this->phone = auth()->user()->phone;
        $this->username = auth()->user()->username;
        $this->country = auth()->user()->country;
        $this->state = auth()->user()->state;
        $this->dob = auth()->user()->dob;
    }

    public function profileUpdate()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'state' => 'required'
        ]);
        if ($this->username && ($this->username != auth()->user()->username)) {
            $this->validate([
                'username' => 'required|unique:users'
            ]);
            auth()->user()->username = $this->username;
        }
        if ($this->first_name) auth()->user()->first_name = $this->first_name;
        if ($this->last_name) auth()->user()->last_name = $this->last_name;
        if ($this->gender) auth()->user()->gender = $this->gender;
        if ($this->phone) auth()->user()->phone = $this->phone;
        if ($this->country) auth()->user()->country = $this->country;
        if ($this->state) auth()->user()->state = $this->state;
        if ($this->dob) auth()->user()->dob = $this->dob;
        auth()->user()->save();
        $this->emit('alert', ['message' => 'Updated Successfully', 'type' => 'success']);
        $this->edit = false;
    }

    public function setState()
    {
        if ($this->country) {
            $country = new Countries();
            return $country->where('cca3', $this->country)->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();

        }
//            $this->emit('alert', ['message' => 'Country Not Found', 'type' => 'error']);
        return null;
    }

    public function render()
    {
        $all_countries = get_all_countries();
        $states = $this->setState();
        return view('livewire.user.profile')->with(['countries' => $all_countries, 'states' => $states]);
    }
}
