<?php

namespace App\Vito\Plugins\Bagubits\FileBackup\Actions;

use App\DTOs\DynamicField;
use App\DTOs\DynamicForm;
use App\SiteFeatures\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Backups extends Action
{
    public function name(): string
    {
        return 'Backups';
    }

    public function active(): bool
    {
        return true;
    }

    public function form(): ?DynamicForm
    {
        return DynamicForm::make([
            DynamicField::make('alert')
                ->alert()
                ->label('Important!')
                ->description('Plugin is work in progress. Use at your own risk.')
        ]);
    }

    public function handle(Request $request): void
    {
        $request->session()->flash('success', 'Successfully');
    }
}