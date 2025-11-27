<?php

namespace App\Livewire;

use App\Models\StockItem;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $data = [
            'title' => 'Dashboard',
            'stockItems' => StockItem::count(),
        ];
        return view('livewire.dashboard', $data);
    }
}
