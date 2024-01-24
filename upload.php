<?php

$webhookUrl = "YOUR WEBHOOK";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $file = $_FILES["file"];

    if ($file["error"] === UPLOAD_ERR_OK) {
        $fileName = $file["name"];
        $fileTmpPath = $file["tmp_name"];

        $cfile = new CURLFile($fileTmpPath, mime_content_type($fileTmpPath), $fileName);

        $payload = [
            "file" => $cfile
        ];

        $ch = curl_init($webhookUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            http_response_code(500);
            echo "Failed Discord upload";
        } else {
            $responseArray = json_decode($response, true);
            $fileUrl = $responseArray["attachments"][0]["url"];
            $fileUrlEncoded = htmlspecialchars($fileUrl);
            // db save or smt
            http_response_code(200);
            echo "File uploaded";
        }
    } else {
        http_response_code(400);
        echo "File upload failed";
    }
} else {
    http_response_code(405);
    echo "need POST";
}