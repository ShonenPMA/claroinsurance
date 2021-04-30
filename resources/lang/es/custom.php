<?php

return [
    'attribute' => [
        'tenant' => 'El tenant',
    ],
    'title' => [
        'error' => 'Error',
        'warning' => 'Advertencia',
        'success' => 'Éxito',
    ],
    'errors' => [
        'image' => 'Ocurrió un error al momento de subir la imagen. Por favor, inténtelo nuevamente.',
        'file' => 'Ocurrió un error al momento de subir el archivo. Por favor, inténtelo nuevamente.',
        'video' => 'Ocurrió un error al momento de subir el video. Por favor, inténtelo nuevamente.',
    ],
    'message' => [
        'disable' => [
            'success' => ':name se ha deshabilitado.',
            'error' => 'Lo sentimos. :name no se pudo deshabilitar debido a un error.',
        ],
        'resend' => [
            'success' => 'El email se ha reenviado.',
            'error' => 'Lo sentimos. El email no se pudo reenviar debido a un error.',
        ],
        'create' => [
            'success' => ':name se ha creado.',
            'error' => 'Lo sentimos. :name no se pudo crear debido a un error.',
        ],
        'update' => [
            'success' => ':name se ha actualizado.',
            'error' => 'Lo sentimos. :name no se pudo actualizar debido a un error.',
            'plural' => [
                'success' => ':name se han actualizado.',
                'error' => 'Lo sentimos. :name no se pudieron actualizar debido a un error.',
            ],
        ],
        'delete' => [
            'success' => ':name se ha eliminado.',
            'error' => 'Lo sentimos, :name no se pudo eliminar debido a un error.',
        ],
        'export' => [
            'success' => 'El archivo se ha exportado.',
            'no_data' => [
                'range' => 'No se encontraron resultados en la fecha especificada',
                'total' => 'No se encontraron resultados',
            ],
        ],
        'order'  => 'Arrastre los elementos en el orden que desee mostrarlos',
        'cant_delete'  => 'No se puede eliminar debido a que está anidado en al menos un proyecto',
        'cant_delete_post'  => 'No se puede eliminar debido a que está anidado en al menos un Post',
    ],
    'order' => [
        'timeline' => [
            'reserve' => 'El cliente registro la reserva.',
            'order_received' => 'Se envió el email sobre: Espera de confirmación de pago de la reserva a :name (:email).',
            'order_paid' => 'Se envió el email sobre: Pago confirmado de la reserva a :name (:email).',
            'order_not_paid' => 'Se envió el email sobre: Pago rechazado de la reserva a :name (:email).',

            'resend_order_received' => 'Se reenvió el email sobre: Espera de confirmación de pago de la reserva a :name (:email).',
            'resend_order_paid' => 'Se reenvió el email sobre: Pago confirmado de la reserva a :name (:email).',
            'resend_order_not_paid' => 'Se reenvió el email sobre: Pago rechazado de la reserva a :name (:email).',
        ],
    ],
    'mail' => [
        'subjects' => [
            'order_received' => ':name, Hemos hecho la reserva de tu Depa',
            'order_paid' => ':name, el pago de la reserva de tu Depa ha sido confirmado',
            'order_not_paid' => ':name, No se pudo completar la reserva de tu Depa',
        ],
    ],
];
