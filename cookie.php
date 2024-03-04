<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="cookie-consent" class="alert alert-dark fixed-bottom mb-0" role="alert">
        "¡Bienvenido/a! Para ofrecerte la mejor experiencia en nuestro sitio web, utilizamos cookies. Al hacer clic en 'Aceptar', estás de acuerdo con nuestra política de cookies. Puedes obtener más información en nuestra página de política de privacidad. ¡Gracias por confiar en nosotros!"        <button id="accept-cookies" class="btn btn-primary ml-2">Aceptar</button>
        </div>
    <script>
        // Función para ocultar el mensaje de aceptación de cookies
        function hideCookieConsent() {
            document.getElementById("cookie-consent").style.display = "none";
        }

        // Evento click para el botón de aceptar cookies
        document.getElementById("accept-cookies").addEventListener("click", function() {
            // Al hacer clic en aceptar, ocultar el mensaje y establecer una cookie
            hideCookieConsent();
            document.cookie = "cookie_accepted=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
        });

        // Verificar si la cookie de aceptación de cookies ya está establecida
        if (document.cookie.indexOf("cookie_accepted") !== -1) {
            hideCookieConsent(); // Si la cookie está establecida, ocultar el mensaje de aceptación de cookies
        }
    </script>
</body>
</html>