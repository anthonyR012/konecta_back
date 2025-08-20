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
            ['KNC101','BOG','MDE','+1 day 09:00',120,120,350.00,"https://media.istockphoto.com/id/155439315/es/foto/avi%C3%B3n-de-pasajeros-volando-sobre-nubes-durante-la-puesta-del-sol.jpg?s=612x612&w=0&k=20&c=E6zuCTGyaqlKa7_UDwg6vDVNFe5U53tUJZRhinQ02gg="],
            ['KNC102','MDE','CTG','+1 day 14:00',90, 90,  280.00,"https://media.cnn.com/api/v1/images/stellar/prod/cnne-1689366-240508093053-07-embraer-profile.jpg?q=w_2000,c_fill"],
            ['KNC201','BOG','CLO','+2 day 07:30',110,110,300.00,"https://universidadeuropea.com/resources/media/images/tipos-aviones-1200x630.original.jpg" ],
            ['KNC301','CLO','BOG','+3 day 18:45',100,100,320.00,"https://media.istockphoto.com/id/1526986072/es/foto/avi%C3%B3n-volando-sobre-mar-tropical-al-atardecer.jpg?s=612x612&w=0&k=20&c=fDZcKAoW0Fs7zRq5kmODsqQw7gOz0qp1a5Ad2W7gPt8="],
            ['SNC301','CLO','BOG','+3 day 18:45',100,100,320.00,"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnhsuvYhaoz-PBYI0y_pRcd3FQkGF3p_CeGQ&s"],
            ['FNC301','CLO','BOG','+3 day 18:45',100,100,320.00,"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNXiyiwu5b9iMCj_tXB8NCaK24ttPFQLR9bQ&s"],
            ['GNC301','CLO','BOG','+3 day 18:45',100,100,420.00,"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiSG7aMzR6ZyhCrZsQxNV_Y5hHsQU3rxyv6g&s"],
            ['KNC301','CLO','BOG','+3 day 18:45',100,100,620.00,"https://concepto.de/wp-content/uploads/2023/01/avion.jpg"],
            ['KNG301','CLO','BOG','+3 day 18:45',100,100,120.00,"https://thelogisticsworld.com/wp-content/uploads/2023/08/Aeromexico-828x548.jpg"],
            ['KJC301','CLO','BOG','+3 day 18:45',100,100,50.00,"https://media.cnn.com/api/v1/images/stellar/prod/cnne-1332888-aviones-sustentables-de-nasa-y-boeing.jpg?c=16x9&q=h_833,w_1480,c_fill"],
            ['ENC301','CLO','BOG','+3 day 18:45',100,100,540.00,"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIGaJR8oD6DWzIVhBNmYk-ut2YDanKAtLRGQ&s"],
            ['ANC301','CLO','BOG','+3 day 18:45',100,100,410.00,"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBTI5mJgeFz65fmDy-GvBeSIp1UsROrj8Sdg&s"],
        ];
        foreach ($rows as [$code,$o,$d,$when,$total,$avail,$price,$icon]) {
            Flight::updateOrCreate(
                ['code'=>$code],
                [
                    'origin' => $o,
                    'destination' => $d,
                    'departure_at' => Carbon::parse($when),
                    'seats_total' => $total,
                    'seats_available' => $avail,
                    'price' => $price,
                    'icon' => $icon
                ]
            );
        }
    }
}
