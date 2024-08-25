<?php

namespace App\Console\Commands;

use App\Services\CategoryMarginServices;
use Illuminate\Console\Command;

class set_margin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'categories:set_margin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        (new CategoryMarginServices())->calculate();
    }
}
