<div style="background-color: #ffffff; padding: 40px;">
    <table align="center" width="100%"
        style="max-width: 600px; background-color: #f4f4f4; border-radius: 8px; overflow: hidden;">

        <tr>
            <td style="padding: 20px 30px; text-align:center;">
                <h3 style="color: #333;">Hola, {{ $data['name'] }}</h3>
                <p style="color: #555; font-size: 15px;">
                    Muchas gracias por contactarnos. Hemos recibido tu mensaje con el motivo
                    <b>"{{ $data['title'] }}"</b>
                    y te responderemos lo antes posible.
                </p>
            </td>
        </tr>

        <tr>
            <td style="padding: 20px 30px; text-align:center;">
                <p style="color: #555; font-size: 14px;">
                    Saludos,<br>El equipo de DePropio
                </p>
            </td>
        </tr>

        <tr>
            <td style="text-align: center; padding: 20px;">
                <a href="{{ url('/') }}"
                    style="display: inline-block; background-color: #442288; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 5px; font-size: 15px;">
                    Acceder a DePropio
                </a>
            </td>
        </tr>

        <tr>
            <td style="padding: 20px 30px; font-size: 12px; color: #aaa; text-align: center;">
                © {{ date('Y') }} DePropio. Todos los derechos reservados.
            </td>
        </tr>
    </table>
</div>
