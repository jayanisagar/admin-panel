<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminder date and time match send email';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $count = \DB::table('users')
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->count();
 
            echo "Today $count users registered";

        \Log::info("Cron is working fine!",  $count);
        $this->info('Demo:Cron Cummand Run successfully!');


        // Get Today Date
    }
}
