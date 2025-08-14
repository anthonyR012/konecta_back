<?php

namespace Database\Seeders;

use App\Models\Flight;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            ['KNC101','BOG','MDE','+1 day 09:00',120,120,350.00],
            ['KNC102','MDE','CTG','+1 day 14:00',90, 90,  280.00],
            ['KNC201','BOG','CLO','+2 day 07:30',110,110,300.00],
            ['KNC301','CLO','BOG','+3 day 18:45',100,100,320.00],
            ['SNC301','CLO','BOG','+3 day 18:45',100,100,320.00],
            ['FNC301','CLO','BOG','+3 day 18:45',100,100,320.00],
            ['GNC301','CLO','BOG','+3 day 18:45',100,100,420.00],
            ['KNC301','CLO','BOG','+3 day 18:45',100,100,620.00],
            ['KNG301','CLO','BOG','+3 day 18:45',100,100,120.00],
            ['KJC301','CLO','BOG','+3 day 18:45',100,100,50.00],
            ['ENC301','CLO','BOG','+3 day 18:45',100,100,540.00],
            ['ANC301','CLO','BOG','+3 day 18:45',100,100,410.00],
        ];
        foreach ($rows as [$code,$o,$d,$when,$total,$avail,$price]) {
            Flight::updateOrCreate(
                ['code'=>$code],
                [
                    'origin' => $o,
                    'destination' => $d,
                    'departure_at' => Carbon::parse($when),
                    'seats_total' => $total,
                    'seats_available' => $avail,
                    'price' => $price,
                ]
            );
        }
    }
}
