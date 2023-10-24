<?php
  // Correo al que se enviarán los datos del formulario.
  $receiving_email_address = 'plusmarketinglyl@gmail.com';

  // Verificación básica para asegurar que todos los campos requeridos están presentes.
  if(!isset($_POST['fullName']) || !isset($_POST['birthDate']) || !isset($_POST['city'])) {
    die('Faltan campos requeridos.');
  }

  // Establecer la información del remitente y el asunto.
  $from_name = "Formulario de Simulador de Pensión";
  $from_email = "no-reply@yourdomain.com"; // Aquí puedes poner una dirección de correo genérica de tu dominio.
  $subject = "Nuevo envío desde el Simulador de Pensión";

  // Construir el cuerpo del mensaje.
  $message = "Nombre completo: " . $_POST['fullName'] . "\n";
  $message .= "Fecha de nacimiento: " . $_POST['birthDate'] . "\n";
  $message .= "Ciudad en donde vive: " . $_POST['city'] . "\n";
  $message .= "CURP: " . $_POST['curp'] . "\n";
  $message .= "Número del seguro social: " . $_POST['socialSecurityNumber'] . "\n";
  $message .= "WhatsApp / Teléfono: " . $_POST['whatsapp'] . "\n";

  // Encabezados del correo.
  $headers = "From: $from_name <$from_email>\r\n";
  $headers .= "Reply-To: $from_email\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

  // Enviar el correo.
  if(mail($receiving_email_address, $subject, $message, $headers)) {
    echo "Formulario enviado con éxito.";
  } else {
    echo "Hubo un error al enviar el formulario. Por favor, inténtalo de nuevo.";
  }
?>
