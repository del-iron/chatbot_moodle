<?php
header("Content-Type: application/json");

$messages = [
    "oi" => "Olá! Como posso te ajudar?",
    "como você está?" => "Estou bem! E você?",
    "qual seu nome?" => "Sou um chatbot simples em PHP!",
    "o que você faz?" => "Respondo perguntas básicas.",
    "adeus" => "Tchau! Tenha um ótimo dia!"
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = json_decode(file_get_contents("php://input"), true);
    $question = strtolower(trim($input["message"]));

    $response = $messages[$question] ?? "Desculpe, não entendi. Poderia reformular?";
    
    echo json_encode(["response" => $response]);
}
?>
