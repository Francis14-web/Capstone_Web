<?php

namespace App\Http\Livewire;

use App\Models\Food;
use Livewire\Component;
use Livewire\WithPagination;

class CanteenMenu extends Component
{
    public $category = "";
    public $search = "";
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $listeners = [
        'refreshMenu' => 'render',
    ];

    public function delete($id)
    {
        $food = Food::find($id);
        $food->delete();
        $this->emit('refreshMenu');
    }

    public function change($category)
    {
        $this->category = $category;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function reduceQuantity(Food $food){
        if ($food->food_stock == 0) {
            return;
        }
        $food->food_stock = $food->food_stock - 1;
        $food->save();
        $this->emit('refreshMenu');
    }

    public function increaseQuantity(Food $food){
        $food->food_stock = $food->food_stock + 1;
        $food->save();
        $this->emit('refreshMenu');
    }

    public function inputQuantity(Food $food, $newQuantity){
        if ($newQuantity < 0) {
            return;
        }
        $food->food_stock = $newQuantity;
        $food->save();
        $this->emit('refreshMenu');
    }

    public function render()
    {
        $query = Food::where('owner_id', auth()->guard('canteen')->user()->id);

        if (!empty($this->category)) {
            $query = $query->where('food_category', $this->category);
        }

        $foods = $query->search([
                'food_name',
            ], $this->search)
            ->orderBy('food_name')
            ->paginate(10);

        return view('livewire.canteen-menu', [
            'foods' => $foods,
        ]);

    }
}
