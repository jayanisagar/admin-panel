<?php

namespace App\Console\Commands;

use aIlluminate\Console\Command;
use App\Reminder;

class ReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminder Email Send';

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
        
        $reminder = Reminder::all();
        $this->info('reminder:cron Cummand Run successfully!', $reminder);

    }
}
