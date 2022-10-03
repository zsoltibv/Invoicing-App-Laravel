<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\DateProdus;

class FacturaForm extends Component
{
    public $allProducts = [];
    public $orderProducts = [];

    public function mount(){
        $user = Auth::user();

        $this->allProducts = DateProdus::where('user_id', $user->id)->get();
        $this->orderProducts = [
            ['product_id' => '', 'quantity' => 1]
        ];
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    public function addProduct(){
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
    }

    public function render()
    {
        $user = Auth::user();

        return view('livewire.factura-form', compact('user'));
    }
}
