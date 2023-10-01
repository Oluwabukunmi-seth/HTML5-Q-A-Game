<?php
// Set the content type to JSON
header('Content-Type: application/json');

// Define the path to the XML file (adjust the file path)
$xmlFilePath = './xml/questions.xml';

// Check if the XML file exists
if (file_exists($xmlFilePath)) {
    // Load and parse the XML file
    $xml = simplexml_load_file($xmlFilePath);

    if ($xml !== false) {
        // Convert the XML data to an associative array
        $data = json_decode(json_encode($xml), true);

        // Send the JSON data as the response
        echo json_encode($data);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to parse XML data.']);
    }
} else {
    http_response_code(404);
    echo json_encode(['error' => 'XML file not found.']);
}
?>
