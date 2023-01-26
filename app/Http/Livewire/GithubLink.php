<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class GithubLink extends Component
{
    public string $github_link = '';
    public string $status = '';

    public function mount()
    {
        $this->github_link = session('github_link', '');
        $this->status = session('status', '');
    }

    public function updatedGithubLink()
    {
        session(['github_link' => $this->github_link]);
        session(['status' => '']);
        $end_point = 'https://api.github.com/repos/'.substr($this->github_link, 19);
        $github_info = Http::withToken(config('dns-manager.github-api-token'))->withOptions(['verify' => false])
        ->get($end_point);
        if($github_info->status() != 200) {
            session(['status' => 'repository not found on github']);
        } else {
            session(['status' => '']);
        }
    }

    public function render()
    {
        return view('livewire.github-link');
    }
}
