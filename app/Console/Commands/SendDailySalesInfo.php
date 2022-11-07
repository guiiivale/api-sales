<?php

namespace App\Console\Commands;

use App\Mail\SalesMail;
use App\Models\Seller;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDailySalesInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:sales-info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send e-mail with daily sales info';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sellers = Seller::all();
        foreach ($sellers as $seller) {
            Mail::to($seller->email)->send(new SalesMail($seller->id));
        }
    }
}
