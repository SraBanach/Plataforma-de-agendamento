<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/descricaoServico.css">

    
</head>
<body>

<?php
// Conexão com o banco de dados
$dsn = 'mysql:dbname=db_plataformaagendamento;host=127.0.0.1';
$user = 'root';
$password = '';
$banco = new PDO($dsn, $user, $password);
 
// Seleção de dados
$select = "SELECT s.*, p.*
           FROM tb_cad_servicos s
           LEFT JOIN tb_cad_profissional p
           ON s.id_servico = p.id_profissional";
$resultado = $banco->query($select)->fetchAll();
 
// Gerar os próximos 7 dias
date_default_timezone_set('America/Sao_Paulo');
$datas = [];
for ($i = 0; $i < 7; $i++) {
    $data = date('Y-m-d', strtotime("+$i days"));
    $diaSemana = date('D', strtotime($data));
   
    // Traduzindo dias da semana
    $diasTraduzidos = [
        'Sun' => 'DOM', 'Mon' => 'SEG', 'Tue' => 'TER', 'Wed' => 'QUA',
        'Thu' => 'QUI', 'Fri' => 'SEX', 'Sat' => 'SÁB'
    ];
   
    $datas[] = [
        'data' => $data,
        'dia' => $diasTraduzidos[$diaSemana],
        'diaMes' => date('d/m', strtotime($data))
    ];
}
 
$horariosDisponiveis = ['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'];
// horario de funcionamento das 8 as 16 
// se ele for agendar depois disso, bloquear
//listar todo os horarios disponiveis, se ninguem estiver !=empty não listar; 
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Variáveis recebidas do formulário
    $profissional = $_POST['profissional'];
    $servico = $_POST['servico'];
    $valor = $_POST['valor'];
    $horario = $_POST['horario'];
    $data_agendamento = $_POST['data_agendamento'];
    $observacoes = $_POST['observacoes'];
 
    // Inserir no banco de dados
    $select = "INSERT INTO tb_agendamento (profissional, servico, valor, horario, data_agendamento, observacoes)
            VALUES (:profissional, :servico, :valor, :horario, :data_agendamento, :observacoes)";
   
    $stmt = $banco->prepare($select);
    $stmt->bindParam(':profissional', $profissional);
    $stmt->bindParam(':servico', $servico);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':horario', $horario);
    $stmt->bindParam(':data_agendamento', $data_agendamento);
    $stmt->bindParam(':observacoes', $observacoes);

    if ($stmt->execute()) {
        // Agendamento realizado com sucesso
        echo "<script>alert('Agendamento realizado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao realizar o agendamento. Tente novamente!');</script>";
    }
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento - Beauty Salon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="top-section">
        <img src="./assets/img/logoSalao.jpg" alt="Logo" class="logo">
        <div class="salon-info">
            <h2>Nome do Salão</h2>
            <p>Endereço</p>
            <p>Horário de funcionamento</p>
        </div>
    </div>
    
    <div class="image-gallery">
        <img src="./assets/img/beauty-salon.jpg" alt="Foto 1">
        <img src="./assets/img/salaodebeleza.jpg" alt="Foto 2">
        <img src="./assets/img/beauty-salon.jpg" alt="Foto 3">
    </div>
    <!-- <div class="container mt-5"> -->
        <h2>Serviços</h2>
        <div class="d-flex justify-content-center align-items-center vh-400" >
        <div class="col-md-9">
            <ul class="list-group">
    <?php foreach ($resultado as $linha) { ?>
        <li class="list-group-item list-group-item-action" 
            data-bs-toggle="modal" 
            data-bs-target="#agendamentoModal"
            data-servico="<?= $linha['servico'] ?>"
            data-profissional="<?= $linha['nome_profissional'] ?>"
            data-valor="<?= $linha['valor'] ?>"
            data-categoria="<?= $linha['categoria'] ?>"
            style="cursor: pointer;">
            <?= $linha['servico'] ?> <span>R$ <?= $linha['valor'] ?></span>
        </li>
    <?php } ?>
</ul>
            </div>
        </div>
 
        <!-- Modal de Agendamento -->
        <div class="modal fade" id="agendamentoModal" tabindex="-1" aria-labelledby="agendamentoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agendamentoModalLabel">Escolha o Profissional</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Profissional Selecionado -->
                        <p id="profissionalEscolhido"></p>

                        <!-- Formulário -->
                        <form action="" method="POST">
                            <input type="hidden" name="profissional" id="profissional">
                            <input type="hidden" name="servico" id="servico">
                            <input type="hidden" name="valor" id="valor">
                            <input type="hidden" name="data_agendamento" id="data_agendamento">
                            <input type="hidden" name="horario" id="horario">
                            <input type="hidden" name="observacoes" id="observacoes">

 
                            <div class="form-group">
                                <label for="data">Escolha a Data</label>
                                <select class="form-control" name="data_agendamento" id="data" required>
                                    <?php foreach ($datas as $dia) { ?>
                                        <option value="<?= $dia['data'] ?>"><?= $dia['dia'] ?> - <?= $dia['diaMes'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
 
                            <div class="form-group mt-3">
                                <label for="horario">Escolha o Horário</label>
                                <select class="form-control" name="horario" id="horarioSelect" required>
                                    <?php foreach ($horariosDisponiveis as $hora) { ?>
                                        <option value="<?= $hora ?>"><?= $hora ?></option>
                                    <?php } ?>
                                </select>
                            </div>


                            <label for="observacoes">Observações</label>
                            <textarea class="form-control" name="observacoes" id="observacoes" rows="3"></textarea>

                            <div class="modal-footer mt-4">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <!-- <button type="button" class="btn btn-success" data-bs-dismiss="modal">Agendar</button> -->
                                <button type="button" class="btn btn-primary" id="btnAbrirResumo">Agendar</button>

                            </div>
<!-- modal resumo  -->
                            <div class="modal fade" id="resumoAgendamento" aria-hidden="true" aria-labelledby="resumoAgendamento" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2>Resumo </h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                <div class="modal-body">
                                <p id="resumoTexto"></p>
                                </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Confirmar Agendamento</button>
                            </div>
                        </div>
                    </div>
                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
    

    <div class="avalicoes">
        <p>Avaliações</p>
    </div>
</div>
    


</body>
</html>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById("btnAbrirResumo").addEventListener("click", function () {
        // Atualizar o resumo antes de abrir o modal
        document.getElementById("resumoTexto").innerHTML = `
            <strong>Profissional:</strong> ${document.getElementById("profissional").value} <br>
            <strong>Serviço:</strong> ${document.getElementById("servico").value} <br>
            <strong>Valor:</strong> R$ ${document.getElementById("valor").value} <br>
            <strong>Data:</strong> ${document.getElementById("data").value} <br>
            <strong>Horário:</strong> ${document.getElementById("horarioSelect").value} <br>
            <strong>Observações:</strong> ${document.getElementById("observacoes").value}
        `;

        // Abrir modal de resumo
        var resumoModal = new bootstrap.Modal(document.getElementById("resumoAgendamento"));
        resumoModal.show();
    });
</script>
</body>