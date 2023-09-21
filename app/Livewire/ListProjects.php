<?php

namespace App\Livewire;

use App\Filament\Resources\ProjectResource;
use App\Models\Project;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class ListProjects extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function Table(Table $table): Table
    {
        return ProjectResource::table($table)
            ->query(Project::query());
    }

    public function render()
    {
        return view('livewire.list-projects')
            ->title('Projects');
    }
}
