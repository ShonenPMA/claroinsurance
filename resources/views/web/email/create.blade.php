@extends('layouts.web')

@section('content')
    <div class="w-full container flex justify-center items-center h-screen bg-gray-100 mx-auto">
        <div>
            <h1 class="text-4xl text-center">Enviar Correo</h1>

            <form action="" class="my-16 block max-w-4xl mx-auto" method="POST">
                <x-web.form.input
                    placeholder="Destinatario"
                    name="receiver"
                    :required="true"
                    :autofocus="true"
                />
                <x-web.form.input
                    placeholder="Asunto"
                    name="subject"
                    :required="true"

                />

                <x-web.form.tiny
                    label="Mensaje"
                    name="content"
                    value=""
                />

                <button type="submit" class="w-full mt-4 px-1 py-2 border border-gray-400 text-white rounded-md bg-gray-800">
                Registrarme</button>
                    


            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ mix('js/httpWeb.js') }}"></script>
@endpush