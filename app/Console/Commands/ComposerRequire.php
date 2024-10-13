<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ComposerRequire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:composer-require {package}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Require a package and run composer install or update if needed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $package = $this->argument('package');
        $this->info("Running composer require for package: $package");

        // Execute composer require command
        $output = [];
        $returnVar = null;

        $projectPath = base_path();

        // Run the composer require command without colors and interactive prompts
        exec("cd $projectPath && composer require $package --no-ansi --no-interaction", $output, $returnVar);

        // Output the result of the composer require command
        foreach ($output as $line) {
            Log::info($line); // Log output
            $this->line($line); // Console output
        }

        // Check for errors
        if ($returnVar !== 0) {
            $this->error("Composer require command failed with status: $returnVar");
            return $returnVar; // Exit if there was an error
        }

        $this->info("Composer require completed successfully.");
        return 0; // Success exit code
    }
}
