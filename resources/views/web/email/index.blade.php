@extends('layouts.web')

@section('content')
    <div class="w-full container bg-gray-100 mx-auto mt-8 py-8">
        <h1 class="text-4xl text-center mb-8">Listado de correos</h1>
        <div class="w-full my-4 px-4">
            <a 
                class="border-white bg-gray-800 text-white border-2 rounded-md p-2" 
                href="{{ route('emails.create') }}">Registrar Correo</a>
        </div>
        @csrf
        @if (count($emails) > 0)
        <table id="emails">
            <thead>
                <tr>
                    <th >Destinatario</th>
                    <th>Fecha de creación</th>
                    <th>Estado</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emails as $email)
                <tr>
                    <td>{{ $email->receiver }}</td>
                    <td>{{ $email->created_at }}</td>
                    <td>{{ $email->state }}</td>
                    <td><a class="delete p-2 bg-red-600 text-white" href="{{route('emails.destroy', $email)}}">ELIMINAR</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @else
            No hay correos registrados
        @endif

    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/httpWeb.js') }}"></script>
@endpush