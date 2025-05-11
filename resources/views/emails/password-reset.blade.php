<div style="background-color: #ffffff; padding: 40px;">
    <table align="center" width="100%"
        style="max-width: 600px; background-color: #f4f4f4; border-radius: 8px; overflow: hidden;">

        <tr>
            <td style="padding: 20px 30px; text-align:center;">
                <h3 style="color: #333;">Hola, {{ $user->name }}</h3>
                <p style="color: #555; font-size: 15px;">
                    Hemos recibido una solicitud para restablecer tu contraseña.
                </p>
                <p style="color: #555; font-size: 14px;">
                    Haz clic en el siguiente botón para continuar:
                </p>
            </td>
        </tr>

        <tr>
            <td style="text-align: center; padding: 20px;">
                <a href="{{ $resetUrl }}"
                    style="display: inline-block; background-color: #442288; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 5px; font-size: 15px;">
                    Restablecer contraseña
                </a>
            </td>
        </tr>

        <tr>
            <td style="padding: 20px 30px; font-size: 12px; color: #aaa; text-align: center;">
                Si no solicitaste este cambio, ignora este correo.<br><br>
                © {{ date('Y') }} DePropio. Todos los derechos reservados.
            </td>
        </tr>
    </table>
</div>
