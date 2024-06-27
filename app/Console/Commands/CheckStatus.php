<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use App\Models\Event;

class CheckStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-status';

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
        //
        $now = Carbon::now();
        $events = Event::where('end', '<', $now)->get();
        foreach ($events as $event) {
            $event->status = 0;
            $event->save();

            $this->info('Event ' . $event->title . ' is completed.');
        }

        return 0;
    }
}
