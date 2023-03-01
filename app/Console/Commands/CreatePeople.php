<?php

namespace App\Console\Commands;

use App\Models\Person;
use Illuminate\Console\Command;

class CreatePeople extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'people:create {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates people';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Person::factory()->count($this->argument('count'))->create();
    }
}
