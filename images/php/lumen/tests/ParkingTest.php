<?php
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ParkingTest extends TestCase
{
    public function testShouldReturnAllDataParkingList()
    {
        // menampilkan data mobil yang parkir
        $this->get("parking/list", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(['data','message']);
    }

    public function testShouldReturnAllDataParkingSlot()
    {
        // menampilkan data mobil yang parkir
        $this->get("parking/slot", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data'=> ['*' =>
        [
            'slot_number',
            'is_avalible',
            'registration_number'
        ]
    ],'message']
        );
    }

    // proses ketika mobil masuk ke parkiran
    public function testShouldCreateParkingIn()
    {
        $parameters = [
            'car_color' => 'Red',
            'license_plate_number' => 'BL0001AB',
        ];

        $this->post("parking/in", $parameters, []);
        $this->seeStatusCode(201);
        $this->seeJsonStructure(
            ['success','message','result' =>
                [
                    'slot',
                    'registration_number',
                    'license_plate_number',
                    'car_color',
                    'in',
                    'out'
                ]
            ]
        );
    }

    // proses ketika mobil keluar dan mengupdate status slot menjadi avaible
    public function testShouldUpdateStatusSlot()
    {
        $data = [
            'car_color' => 'Red',
            'license_plate_number' => 'BL0001AB',
        ];
        $createParking = $this->json('POST', '/parking/in', $data)->response->getContent();
        $resultCreateParking = json_decode($createParking);


        $parameters = [
            'registration_number' => $resultCreateParking->result->registration_number
        ];

        $this->put("parking/out", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['success','message','result' =>
                [
                    'slot',
                    'registration_number',
                    'license_plate_number',
                    'car_color',
                    'in',
                    'out'
                ]
            ]
        );
    }
}
