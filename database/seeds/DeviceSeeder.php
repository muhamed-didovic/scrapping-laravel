<?php

use App\Device;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $lesson = new Device();
        $lesson->name = "BW1 PARAMETER DATA";
        $lesson->save();

        //2
        $lesson = new Device();
        $lesson->name = "UAN#2 PARAMETER DATA";
        $lesson->save();

        //3
        $lesson = new Device();
        $lesson->name = "REMOTE MONITORING SUMMARY";
        $lesson->save();

        //4
        $lesson = new Device();
        $lesson->name = "UAN#1 PARAMETER DATA";
        $lesson->save();

        //5
        $lesson = new Device();
        $lesson->name = "BW3 PARAMETER DATA";
        $lesson->save();

        //6
        $lesson = new Device();
        $lesson->name = "BW2 PARAMETER DATA";
        $lesson->save();

        //7
        $lesson = new Device();
        $lesson->name = "CHAMA PARAMETER DATA";
        $lesson->save();

        //8
        $lesson = new Device();
        $lesson->name = "ENG RIO";
        $lesson->save();

    }
}
