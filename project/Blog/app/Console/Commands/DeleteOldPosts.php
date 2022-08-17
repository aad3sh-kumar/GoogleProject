<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Models\Notification;
use App\Http\Controllers\NotificationController;
use App\Jobs\DeletePostJob;

class DeleteOldPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'purge:posts {--days=30 : How many days old posts to remove} {--queue : Should this command be queued?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes all posts that have not been modified for a certain number of days';

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
        // Now we will fetch the updated_at column and compare it with the current date and time to the second
        // If the difference of days exceeds $days, then delete that post
        $days = $this->option('days');

        $is_queued = $this->option('queue');

        $Now = Carbon::now('Asia/Karachi');

        $progress = $this->output->createProgressBar(Post::count());
        $cnt = 0;
        $progress->start();
        foreach(Post::lazybyId(200) as $post) {
            $UpdatedAt = $post->updated_at->setTimezone('Asia/Karachi');
            if ($Now->diffInDays($UpdatedAt) >= $days) {
                $cnt += 1;
                if ($is_queued) {
                    DeletePostJob::dispatch($post);
                } else {
                    // NotificationController::send($post->author, 'Your post '.$post->title.' has been expired due to exceeding the time limit!');
                    PostController::delete($post);
                }
                
            }
            $progress->advance();
        }
        $progress->finish();
        $this->newLine();
        $this->info('Successfully deleted '.$cnt.' posts');
        
        return 0;
    }
}
