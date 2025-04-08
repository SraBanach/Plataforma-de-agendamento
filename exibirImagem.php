<?php
// Conexão com o banco
$conn = new mysqli("localhost", "root", "", "db_plataformaagendamento");
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recebe o ID da empresa e o campo da imagem
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$campo = isset($_GET['campo']) ? $_GET['campo'] : 'fotoEmpresa1';

// Validação de segurança
$camposPermitidos = ['fotoEmpresa1', 'fotoEmpresa2', 'fotoEmpresa3', 'fotoLogo'];
if (!in_array($campo, $camposPermitidos)) {
    die("Campo inválido.");
}

// Consulta o valor do campo
$sql = "SELECT $campo FROM tb_cad_empresas WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($imagem);
    $stmt->fetch();

    // Verifica se é BLOB ou nome de arquivo (ex: beleza1.jpg)
    if (strlen($imagem) > 0 && @getimagesizefromstring($imagem)) {
        // É imagem em BLOB
        $finfo = finfo_open();
        $mime = finfo_buffer($finfo, $imagem, FILEINFO_MIME_TYPE);
        finfo_close($finfo);

        header("Content-Type: $mime");
        echo $imagem;
    } else {
        // É nome de arquivo (caminho)
        $caminhoImagem = "assets/img/" . $imagem;

        if (file_exists($caminhoImagem)) {
            $mime = mime_content_type($caminhoImagem);
            header("Content-Type: $mime");
            readfile($caminhoImagem);
        } else {
            // Fallback se a imagem não existir
            header("Content-Type: image/png");
            readfile("assets/img/sem-imagem.png");
        }
    }
} else {
    // Fallback geral
    header("Content-Type: image/png");
    readfile("assets/img/sem-imagem.png");
}

$stmt->close();
$conn->close();
?>
