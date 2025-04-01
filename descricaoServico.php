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
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Variáveis recebidas do formulário
    $profissional = $_POST['profissional'];
    $servico = $_POST['servico'];
    $valor = $_POST['valor'];
    $horario = $_POST['horario'];
    $data_agendamento = $_POST['data_agendamento'];
 
    // Inserir no banco de dados
    $sql = "INSERT INTO tb_agendamento (profissional, servico, valor, horario, data_agendamento)
            VALUES (:profissional, :servico, :valor, :horario, :data_agendamento)";
   
    $stmt = $banco->prepare($sql);
    $stmt->bindParam(':profissional', $profissional);
    $stmt->bindParam(':servico', $servico);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':horario', $horario);
    $stmt->bindParam(':data_agendamento', $data_agendamento);
   
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
 
    <div class="container mt-5">
        <h2>Escolha o Serviço</h2>
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <?php foreach ($resultado as $linha) { ?>
                        <li>
                            <?= $linha['servico'] ?> <span>R$ <?= $linha['valor'] ?></span>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agendamentoModal"
                               data-servico="<?= $linha['servico'] ?>"
                               data-profissional="<?= $linha['nome_profissional'] ?>"
                               data-valor="<?= $linha['valor'] ?>"
                               data-categoria="<?= $linha['categoria'] ?>">
                               Agendar
                            </a>
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
 
                            <div class="form-group">
                                <label for="data">Escolha a Data</label>
                                <select class="form-control" name="data" id="data" required>
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
 
                            <div class="modal-footer mt-4">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-success">Confirmar Agendamento</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Preencher informações do profissional ao clicar
        var agendamentoModal = document.getElementById('agendamentoModal');
        agendamentoModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var servico = button.getAttribute('data-servico');
            var profissional = button.getAttribute('data-profissional');
            var valor = button.getAttribute('data-valor');
            var categoria = button.getAttribute('data-categoria');
 
            var modalTitle = agendamentoModal.querySelector('.modal-title');
            var modalProfissional = agendamentoModal.querySelector('#profissionalEscolhido');
            var inputProfissional = agendamentoModal.querySelector('#profissional');
            var inputServico = agendamentoModal.querySelector('#servico');
            var inputValor = agendamentoModal.querySelector('#valor');
            var inputCategoria = agendamentoModal.querySelector('#categoria');
           
            inputProfissional.value = profissional;
            inputServico.value = servico;
            inputValor.value = valor;
            modalProfissional.textContent = 'Profissional: ' + profissional + ' (' + categoria + ')';
        });
    </script>
 
</body>
</html>