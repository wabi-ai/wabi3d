<?php
// Receives the prisliste lead-capture POST from index.html and emails it to
// ulrik@wabi3d.no. Plain PHP mail() — no external service or dependency,
// works on standard cPanel/Apache hosting out of the box.

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'method_not_allowed']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
if (!is_array($data)) $data = [];

$email = isset($data['email']) ? trim(str_replace(["\r", "\n"], '', (string) $data['email'])) : '';
$kilde = isset($data['kilde']) ? trim((string) $data['kilde']) : 'wabi3d.no';
$tid   = isset($data['tid']) ? trim((string) $data['tid']) : date('c');

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'invalid_email']);
    exit;
}

$to      = 'ulrik@wabi3d.no';
$subject = 'Ny prisliste-forespørsel fra ' . $email;
$body    = "Noen har lagt igjen e-posten sin for prislisten på wabi3d.no.\n\n"
         . "E-post: $email\n"
         . "Kilde:  $kilde\n"
         . "Tid:    $tid\n";
$headers = "From: WABI 3D nettside <noreply@wabi3d.no>\r\n"
         . "Reply-To: $email\r\n"
         . "Content-Type: text/plain; charset=UTF-8\r\n";

$sent = @mail($to, $subject, $body, $headers);
echo json_encode(['ok' => (bool) $sent]);
