<?php
// Configura le intestazioni per inviare una risposta JSON
header('Content-Type: application/json');

// Recupera i dati inviati dal modulo
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$payment = htmlspecialchars($_POST['payment']);

// Verifica che i dati non siano vuoti
if (!empty($username) && !empty($email) && !empty($payment)) {
    // Simula l'elaborazione del pagamento
    // In un'applicazione reale, dovresti integrare una API di pagamento

    // Simula l'invio di una conferma via email
    $to = $email;
    $subject = 'Conferma Acquisto VIP - Hyperion.Net™ [BETA]';
    $message = "Ciao $username,\n\nGrazie per aver acquistato il VIP su Hyperion.Net™ [BETA].\n\nMetodo di pagamento: $payment\n\nCordiali saluti,\nTeam Hyperion.Net™";
    $headers = 'From: no-reply@hyperion.net' . "\r\n" .
               'Reply-To: no-reply@hyperion.net' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    // Risposta di successo
    $response = [
        'status' => 'success',
        'message' => "Grazie, $username! Il tuo acquisto VIP è stato ricevuto. Ti abbiamo inviato una conferma all'indirizzo $email."
    ];
} else {
    // Risposta in caso di errore
    $response = [
        'status' => 'error',
        'message' => 'Si è verificato un errore. Assicurati di aver compilato tutti i campi.'
    ];
}

// Restituisci la risposta come JSON
echo json_encode($response);
?>
