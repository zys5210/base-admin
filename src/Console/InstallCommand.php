<?php
namespace Song\BaseAdmin\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'base-admin:install';

    protected $description = 'Install zys5210/bases-admin';

    public function handle()
    {
//        $this->call('vendor:publish', ['--provider' => 'Spatie\Permission\PermissionServiceProvider']);
        $this->call('vendor:publish', [
            '--provider' => 'Song\BaseAdmin\Providers\AdminServiceProvider',
            '--tag' => 'config'
        ]);
        $this->call('vendor:publish', [
            '--provider' => 'Song\BaseAdmin\Providers\AdminServiceProvider',
            '--tag' => 'public'
        ]);

        $this->call('vendor:publish', [
            '--provider' => 'Song\BaseAdmin\Providers\AdminServiceProvider',
            '--tag' => 'migrations'
        ]);
    }
}
