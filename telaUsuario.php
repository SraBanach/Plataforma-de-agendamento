<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Usuario</title>
    <link rel="stylesheet" href="./assets/css/telaUsuario.css">

</head>
<body>
    <body>
        <div class="telaUsuario">
            <div id="Dados">
                <h2>Meus dados</h2>
                <div class="cadastro-conteiner">
                    <form action="dados.html" method="get">
                        <h4>Nome completo</h4>
                        <input type="Nome completo" id="campo1" placeholder="kenya banach" name="nome">
                        <br> 
                        <h4>Telefone</h4>
                        <input type="Telefone" id="campo2" placeholder="(xx)xxxxx-xxxx" name="Telefone">
                        <br>
                        <h4>Data nascimento</h4>
                        <input type="Data de nascimento" id="campo3" placeholder="xx/xx/xxxx" name="Data nascimento">
                        <br>
                        <h4>CPF</h4>
                        <input type="CPF" id="campo4" placeholder="xxx.xxx.xxx-xx" name="CPF">
                        <br>
                        <h4>Endereço</h4>
                        <input type="Endereço" id="campo5" placeholder="bairro:   ; rua:  ; numero:    ;" name="Endereço">
                        <br>
                            <li><a href="#" alt="icon"></a></li>
                        </ul>
                        <button class="botaoSalvar" type="submit">Salvar</button>
                    </form>
                </div>
            </div>
            <div class="menu-usuario">
                <button class="botaoHistorico" type="text">Historico</button>
                <button class="botaoFavoritos" type="text">Favoritos</button>
                <button class="botaoAgendamentos" type="text">Agendamentos</button>
            </div>
        </div>
    </body>
    </html>
</body>
</html>