<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Vacation;
use App\Models\Notification;
use Illuminate\Console\Command;

class NotifyExpiredEmployeesVacation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notify-expired-employees-vacation';

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
        $vacations = Vacation::where('return_at', '>', now()->subDays('5')->format('Y-m-d'))->whereNull('notified_at')->whereNull('user_return_at')->get();
        foreach ($vacations as $vacation) {
            Notification::send($vacation->user->id, 'باقي 5 ايام علي رجوع الموظف ' . $vacation->user->name . ' إلي العمل');
            $vacation->update(['notified_at' => now()->format('Y-m-d')]);
        }
    }
}
