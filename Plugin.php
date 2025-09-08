<?php

namespace App\Vito\Plugins\Bagubits\FileBackup;

use App\Plugins\AbstractPlugin;
use App\Plugins\RegisterSiteFeature;
use App\Plugins\RegisterSiteFeatureAction;
use App\Vito\Plugins\AiAe\VitoCopySsl\Actions\Copy;

class Plugin extends AbstractPlugin
{
    protected string $name = 'Vito Files Backup';

    protected string $description = 'Backup files to AWS S3...';

    public function register(): void {}

    public function boot(): void
    {
        foreach (['php', 'php-blank', 'laravel', 'wordpress'] as $featureType) {
            RegisterSiteFeature::make($featureType, 'vito-filebackup')
                ->label('Backup Files')
                ->description('Backup files to AWS S3...')
                ->register();

            RegisterSiteFeatureAction::make($featureType, 'vito-filebackup', 'backup-files')
                ->label('Backup Files')
                ->handler(Copy::class)
                ->register();
        }
    }
}