<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class UnlinkStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:unlink';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove the storage symbolic link';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $link = public_path('storage');

        if (File::exists($link)) {
            File::delete($link);
            $this->info('The storage link has been removed.');
        } else {
            $this->warn('The storage link does not exist.');
        }

        return 0;
    }
}
