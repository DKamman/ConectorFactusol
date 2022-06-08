<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ProductoController;
use App\Models\ClienteCredential;

class PostAllProductos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:productos {cliente? : name of the distributor company}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Posts all distributor products to the 20 Bananas ';

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
        $cliente = $this->argument('cliente');
        if ($cliente != null) {
            $credential = ClienteCredential::where('name', $cliente)->first();
            ProductoController::post($credential);
        } else {
            $credentials = ClienteCredential::all();
            foreach ($credentials as $credential) {
                ProductoController::post($credential);
            }
        }        
    }
}
