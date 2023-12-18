<?php
  // Correo al que se enviarán los datos del formulario.
  $receiving_email_address = 'plusmarketinglyl@gmail.com';

  // Establecer la información del remitente y el asunto.
  $from_name = "Formulario de Simulador";
  $from_email = "no-reply@pensionscg.com"; // Cambia esto por tu dirección de correo genérica.
  $subject = "Nuevo envío desde el Simulador de Pensión";

  // Verificación básica para asegurar que todos los campos requeridos están presentes.
  $required_fields = ['fullName', 'birthDate', 'city', 'whatsapp'];
  foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
      // Puedes cambiar esto por un manejo de error más sofisticado si lo deseas.
      die('Faltan campos requeridos: ' . $field);
    }
  }

  // Construir el cuerpo del mensaje.
  $message = "Nombre completo: " . $_POST['fullName'] . "\n";
  $message .= "Fecha de nacimiento: " . $_POST['birthDate'] . "\n";
  $message .= "WhatsApp / Teléfono: " . $_POST['whatsapp'] . "\n";

  // Encabezados del correo.
  $headers = "From: $from_name <$from_email>\r\n";
  $headers .= "Reply-To: $from_email\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  // Enviar el correo.
  if(mail($receiving_email_address, $subject, $message, $headers)) {
    echo "Formulario enviado con éxito. ¡Nos contactaremos contigo!";
  } else {
    // Podrías usar un código de error HTTP aquí para una mejor práctica.
    http_response_code(500);
    echo "Hubo un error al enviar el formulario. Por favor, inténtalo de nuevo.";
  }
?>
