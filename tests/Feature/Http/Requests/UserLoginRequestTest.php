<?php

namespace Tests\Feature\Http\Requests;

use App\Http\Requests\User\UserLoginRequest;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginRequestTest extends TestCase
{
    private $validator;
    private $rules;

    public function setUp() : void
    {
        parent::setUp();
        $this->rules = (new UserLoginRequest())->rules();
        $this->validator = app()->get('validator');
    }

    public function requestProvider() : array
    {
        $faker = Factory::create(Factory::DEFAULT_LOCALE);

        return [
            'la petición debe fallar cuando falta el email' => [
                function () : array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['email' => '']),
                    ];
                },
            ],
            'la petición debe fallar cuando falta el correo' => [
                function () : array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['password' => '']),
                    ];
                },
            ],
            'la petición debe fallar cuando el correo no tiene el formato correcot' => [
                function () : array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['email' => 'random']),
                    ];
                },
            ],
            'la petición debe ser exitosa en el resto de los casos' => [
                function () : array {
                    return [
                        'shouldPass' => true,
                        'data' => $this->getData(),
                    ];
                },
            ],
            
            
        ];
    }

    public function getData() : array
    {
        $user = User::factory()->create();

        return [
            'email' => $user->email,
            'password' => 'passworD*123',
        ];
    }

    /**
     * @dataProvider requestProvider
     */
    public function test_validacion_funciona_como_se_espera($getData)
    {
        $shouldPass = $getData()['shouldPass'];
        $mockedRequestData = $getData()['data'];

        $this->assertEquals(
            $shouldPass,
            $this->validate($mockedRequestData)
        );
    }

    protected function validate($mockedRequestData)
    {
        return $this->validator
            ->make($mockedRequestData, $this->rules)
            ->passes();
    }
}
