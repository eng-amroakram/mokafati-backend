<?php

namespace App\Livewire\Panel;

use App\Http\Controllers\Services\Services;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Packages extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    protected $service = null;

    public $pagination = 10;
    public $sort_field = 'id';
    public $sort_direction = 'asc'; // desc

    public $search = "";
    public $filters = [];

    public $name = "";
    public $price = "";
    public $cash_back = "";
    public $rewards = "";
    public $minimum_purchase = "";
    public $bonus = "";
    public $validity_period = "";
    public $model_id = "";

    private function setService()
    {
        return Services::createInstance("PackageService") ?? new Services();
    }

    #[Title('لوحة التحكم - الباقات'), Layout('layouts.panel.app')]
    public function render()
    {
        $this->filters["search"] = $this->search;

        $service = $this->setService();
        $packages = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.panel.packages', [
            'packages' => $packages
        ]);
    }

    public function delete($id)
    {
        $service = $this->setService();
        $message = $service->delete($id);
        $this->alertMessage($message, 'success');
    }

    public function alertMessage($message, $type)
    {
        $this->alert($type, '', [
            'toast' => true,
            'position' => 'top-start',
            'timer' => 3000,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }
}
