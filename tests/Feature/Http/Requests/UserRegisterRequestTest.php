<?php

namespace Tests\Feature\Http\Requests;

use App\Http\Requests\UserRegisterRequest;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegisterRequestTest extends TestCase
{
    private $validator;
    private $rules;

    public function setUp() : void
    {
        parent::setUp();
        $this->rules = (new UserRegisterRequest())->rules();
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
            'la petición debe fallar cuando email no tiene el formato correcto' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['email' => $faker->text]),
                    ];
                },
            ],
            'la petición debe fallar cuando la clave no tiene minimo 8 caracteres' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['password' => $faker->text(7)]),
                    ];
                },
            ],
            'la petición debe fallar cuando la clave no tiene un numero' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['password' => 'abcdefghi']),
                    ];
                },
            ],
            'la petición debe fallar cuando la clave no tiene una letra mayúscula' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['password' => 'abcdefghi1']),
                    ];
                },
            ],
            'la petición debe fallar cuando la clave no tiene un caracter especial' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['password' => 'abcdefghi1A']),
                    ];
                },
            ],
            'la petición debe fallar cuando la clave no tiene un caracter especial' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['password' => 'abcdefghi1A']),
                    ];
                },
            ],
            'la petición debe fallar cuando la clave no es igual a la confirmación de clave' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['password_confirmation' => $faker->text]),
                    ];
                },
            ],
            'la petición debe fallar cuando falta el nombre' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['name' => '']),
                    ];
                },
            ],
            'la petición debe fallar cuando falta el nombre tiene mas de 100 caracteres' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['name' => $faker->lexify(str_repeat('?',101))]),
                    ];
                },
            ],
            'la petición debe fallar cuando el celular tiene mas de 10 caracteres' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['phone' => $faker->lexify(str_repeat('?',11))]),
                    ];
                },
            ],
            'la petición debe fallar cuando falta la cédula' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['card' => '']),
                    ];
                },
            ],
            'la petición debe fallar cuando la cédula tiene mas de 11 caracteres' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['card' =>$faker->lexify(str_repeat('?',12))]),
                    ];
                },
            ],
            'la petición debe fallar cuando falta la fecha de nacimiento' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['birth_date' =>'']),
                    ];
                },
            ],
            'la petición debe fallar cuando la fecha de nacimiento no es de tipo date' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['birth_date' =>$faker->text]),
                    ];
                },
            ],
            'la petición debe fallar cuando la fecha de nacimiento no indica que tiene mas de 18 años' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['birth_date' => now()]),
                    ];
                },
            ],
            'la petición debe fallar cuando falta la ciudad' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => false,
                        'data' => array_merge($this->getData(), ['city' => '']),
                    ];
                },
            ],
            'la petición debe ser exitosa para el resto de los casos' => [
                 function () use ($faker): array {
                    return [
                        'shouldPass' => true,
                        'data' => $this->getData()
                    ];
                },
            ],
            
        ];
    }

    public function getData() : array
    {
        $faker = Factory::create(Factory::DEFAULT_LOCALE);

        return [
            'name' => $faker->name,
            'email' => $faker->safeEmail,
            'card' => $faker->text(11),
            'birth_date' => '05-02-2000 01:00:00',
            'password' => 'adminTest*123',
            'password_confirmation' => 'adminTest*123',
            'city' => 414692
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
