<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateBladeFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:blade-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create multiple Blade files in a specific directory';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $directory = resource_path('views/components/page_home');

        // Ensure the directory exists
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Create 13 files named sec_1.blade.php to sec_13.blade.php
        for ($i = 2; $i <= 13; $i++) {
            $filePath = $directory . "/sec_$i.blade.php";
            File::put($filePath, "<!-- sec_$i.blade.php -->");
        }

        $this->info('13 files created successfully in ' . $directory);

        return 0;
    }
}
