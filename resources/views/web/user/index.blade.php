@extends('layouts.web')

@section('content')
    <div class="w-full container bg-gray-100 mx-auto mt-8 py-8">
        <h1 class="text-4xl text-center mb-8">Listado de usuarios</h1>

        @if (count($users) > 0)
        <table id="users">
            <thead>
                <tr>
                    <th >Nombre</th>
                    <th>Cédula</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Edad</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->card }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->age }}</td>
                    <td><a class="delete p-2 bg-red-600 text-white" href="{{route('users.destroy', $user)}}">ELIMINAR</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @else
            No hay usuarios registrados
        @endif

    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/httpWeb.js') }}"></script>
    <script src="{{ mix('js/users.js') }}"></script>
@endpush