<div style="background-color: #ffffff; padding: 40px;">
    <table align="center" width="100%"
        style="max-width: 600px; background-color: #f4f4f4; border-radius: 8px; overflow: hidden;">

        <tr>
            <td style="padding: 20px 30px; text-align:center;">
                <h3 style="color: #333;">Hola, {{ $user->name }}</h3>
                <p style="color: #555; font-size: 15px;">
                    Tu cuenta ha sido creada correctamente. Tu contraseña temporal es:
                </p>
                <p style="font-size: 18px; color: #222; font-weight: bold; ">
                    {{ $password }}
                </p>
                <p style="color: #555; font-size: 14px;">
                    Por seguridad, te recomendamos cambiar tu contraseña en tu primer inicio de sesión.
                </p>
            </td>
        </tr>

        <tr>
            <td style="text-align: center; padding: 20px;">
                <a href="{{ url('/') }}"
                    style="display: inline-block; background-color: #442288; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 5px; font-size: 15px;">
                    Acceder al sitio
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
