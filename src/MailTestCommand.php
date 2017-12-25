<?php

namespace Topcu\MailTest;

use Illuminate\Console\Command;
use Mail;

class MailTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:mail {email: email address} {--queue}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a raw test email to given account.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $to = $this->argument("email");
        $queue_time = date("Y-m-d H:i:s");

        if($this->option("queue")){
            Mail::queue('mailtest:mail', compact('queue_time'), function ($message) use ($to) {
                $message->to($to)->subject('Test Email');
            });
        }else{
            Mail::send('mailtest:mail', compact('queue_time'), function ($message) use ($to) {
                $message->to($to)->subject('Test Email');
            });
        }

    }
}
