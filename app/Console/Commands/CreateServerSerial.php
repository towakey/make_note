<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateServerSerial extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:server_serial';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Server Serial';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $env_serial=config('app.server_serial', '');
        if($env_serial === ""){
            $env = base_path('.env');
            if(file_exists($env)){
                file_put_contents($env, str_replace(
                    'SERVER_SERIAL='.config('app.server_serial', ''),
                    'SERVER_SERIAL='.(string) Str::orderedUuid(),
                    file_get_contents($env)
                ));
                echo "SERVER_SERIAL is set.";
            }
        }else{
            echo "SERVER_SERIAL is already set.";
        }
        return 0;
    }
}
