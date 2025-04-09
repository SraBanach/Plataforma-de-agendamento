<?php
$conn = new mysqli("localhost", "root", "", "db_plataformaagendamento");
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$campo = isset($_GET['campo']) ? $_GET['campo'] : 'foto_servico1';

$camposPermitidos = ['foto_servico1', 'foto_servico2', 'foto_servico3'];
if (!in_array($campo, $camposPermitidos)) {
    die("Campo inválido.");
}

$sql = "SELECT $campo FROM tb_cad_servicos WHERE id_servico = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($imagem);
    $stmt->fetch();

    $caminhoImagem = "assets/img/" . $imagem;

    if (file_exists($caminhoImagem)) {
        $mime = mime_content_type($caminhoImagem);
        header("Content-Type: $mime");
        readfile($caminhoImagem);
    } else {
        header("Content-Type: image/png");
        readfile("assets/img/sem-imagem.png");
    }
} else {
    header("Content-Type: image/png");
    readfile("assets/img/sem-imagem.png");
}

$stmt->close();
$conn->close();
?>
