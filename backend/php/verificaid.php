<?php

    include "cors.php";
    header('Content-Type: application/json');

    include "conexaodb.php";
    
    $file_name_array = explode(".", $_FILES['file']['name']);
    $id = reset($file_name_array);

    $check="SELECT * FROM fotos WHERE id = '$id'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        // Se o ID existe, obtém o primeiro registro encontrado
        $row = $result->fetch_assoc();
        echo json_encode([
            'message' => 'existe este id no meu banco de dados',
            'id' => $row['id'],  // ou outro campo, dependendo do que deseja retornar
            'value' => true
        ]);
    } else {
        // Se o ID não existe
        echo json_encode([
            'message' => 'não existe este id no banco de dados'
        ]);
    }

?>