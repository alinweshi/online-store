<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Database\Factories\StatusFactory;
use Database\Factories\SendingMailsFactory;

class SendingMails extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SendingMailsFactory::new ()->count(1000)->create();
    }
}
