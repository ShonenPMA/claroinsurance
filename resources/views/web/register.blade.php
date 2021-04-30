@extends('layouts.web')

@section('content')
    <div class="w-full container flex justify-center items-center h-screen bg-gray-100 mx-auto">
        <div>
            <h1 class="text-4xl text-center">Formulario de Registro</h1>

            <form class="my-16 block max-w-md mx-auto" method="POST">
                <x-web.form.input
                    placeholder="Correo"
                    name="email"
                    :required="true"
                    :autofocus="true"
                />
                <x-web.form.input
                    placeholder="Clave"
                    name="password"
                    type="password"
                    :required="true"
                />

                <x-web.form.input
                    placeholder="Confirmación de la clave"
                    name="password_confirmation"
                    type="password"
                    :required="true"
                />

                <x-web.form.input
                    placeholder="Nombre"
                    name="name"
                    :required="true"
                />

                <x-web.form.input
                    placeholder="Celular"
                    name="phone"
                />

                <x-web.form.input
                    placeholder="Cédula"
                    name="card"
                    :required="true"
                />

                <x-web.form.input
                    placeholder="Fecha de nacimiento (dd/mm/yyyy)"
                    name="birth_date"
                    :required="true"
                />

                <x-web.form.select
                    name="country"
                    id="country"
                >
                    <option value="">Seleccionar país</option>
                </x-web.form.select>

                <x-web.form.select
                    name="state"
                    id="state"
                >
                    <option value="">Seleccionar estado</option>
                </x-web.form.select>


                <x-web.form.select
                    name="city"
                    id="city"
                >
                    <option value="">Seleccionar ciudad</option>
                </x-web.form.select>


                <x-web.form.input
                    value="Registrarme"
                    type="submit"
                    class="w-full mt-4 px-1 py-2 border border-gray-400 text-white rounded-md bg-gray-800"
                />

            </form>
        </div>
    </div>
@endsection