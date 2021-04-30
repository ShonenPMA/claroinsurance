<?php

namespace App\Console\Commands;

use App\Mail\BasicMail;
use App\Models\Email;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia los correos en pendiente por orden de creación';

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
        $emails = Email::orderBy('created_at', 'ASC')->where('state','PENDIENTE')->get();

        foreach ($emails as $email) {
            $this->info("Enviando correo a: {$email->receiver}!");
            try{

                Mail::to($email->receiver)->send(new BasicMail($email->message));
                $email->state = "ENVIADO";
                $email->save();
                $this->info("Enviado exitosamente");
            }catch(\Exception $e){
                $email->state = "FALLO";
                $email->save();
                $this->error("Falló");
            }

            
        }
    }
}
