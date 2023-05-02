<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\Users\UsersController;
use App\Jobs\MailJob;
use App\Jobs\TelegramJob;
use Illuminate\Console\Command;

class LogCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
//     * @return int
     */
    public function handle()
    {
//        MailJob::dispatch()->onQueue('mailjob');
        TelegramJob::dispatch()->onQueue('telegram-job');
    }
}
