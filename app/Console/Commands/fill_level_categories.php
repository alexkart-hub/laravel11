<?php

namespace App\Console\Commands;

use App\Services\CategoryLevelService;
use Illuminate\Console\Command;

class fill_level_categories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'categories:fill_level';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Заполнение уровней вложенности категорий';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        (new CategoryLevelService())->fill();
    }
}
