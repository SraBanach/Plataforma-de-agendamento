
# Documentação do site Agende Beauty
O site Agende Beauty é uma plataforma de agendamento online onde tem salões cadastrados pelo sistema interno em c# 
No site o cliente consegue fazer o agendamento e o salao tem acesso no sistema interno;
## INDEX
Uma descricao sobre o meu projeto com 4 cards aleatorios de saloes onde a pessoa pode clicar para ver mais detalhes, porem só consegue finalizar o agendamento se estiver logada.
Header:
- [x] Logo: Identidade visual do Agende Beauty
- [x] Menu de Navegação: botão lado direito superior com acesso ao login
Banner Principal:
- [x] Imagem: Algo que represente os serviços oferecidos.
- [x] barra de pesquisa: Para facilitar a busca de parceiros.

corpo: 
- [x] Menu de navegação que serve como filtros de serviços.
- [x] Sobre contando um pouco de como foi realizar o projeto. 
Seção de Serviços:
- [x] 4 cards mostrando de forma aleatoria alguns salões.

Rodapé (Footer):
- [x] Links Úteis: Links para página de tela de servico, ancora sobre, ancora do inico.
- [x] slogan + breve descricao do site
## LOGIN
pagina de login que me envia para a tela Servico
- [x] form com campo email e senha com verificação se esta preenchido corretamente como email, senha caractere especial, letra maiuscula e minuscula.
- [x] campo abaixo para se cadastrar.

- [x] botão para entrar (envia para a tela de serviço)
- [x] mensagem de erro "email ou senha incorreta"

## TELA USUARIO CADASTRO
tela para cadastro do cliente
- [x] form com nome completo, telefone, cpf, email e senha.

## TELA DE SERVIÇO
listagem dos cards salões
- [x] Repete todo o header, com algumas alteraçoes: 
- [x] ao inves de um botao login, aparecer nome do cliente.
- [x] nome do cliente clicavel onde ele tem acesso a tela de usuario onde ele checa as informaçoes dele.
- [x] Menu de navegação que serve como filtros de serviços.
- [x] cards com informaçoes do salão: Foto, nome, endereço;
- [x] quando clicado em algum salão irá para a tela descrição de serviço.

- [x] footer: repetir do index. 
- [x] Links Úteis: Links para página de tela de servico, ancora sobre, ancora do inico.
- [x] slogan + breve descricao do site
## TELA DE USUARIO
- (logado)
area onde o cliente consegue visualizar os agendamentos, com botoes de opções para editar informaçoes, meus agendamentos e voltar para a pagina anterior. 
- [x] Campos com as minhas informaçoes somente para leitura
- [x] botao voltar que vai para a tela de servico 
- [x] botao Meus agendamentos
- [x] editar infomaões

  ## MEUS AGENDAMENTOS
  Local onde visualizo todos os meus agendamentos,podendo cancelar.
- [x] listar todos os meus agendamentos dando opcao de cancelar. 

  ##EDITAR INFORMAÇÕES
- [x] campo que ja vem preenchido com as minhas informaçoes, podendo ser alterado
- [x] para finalizar a alteração o cliente precisa confirmar a senha dele


## DESCRIÇÃO DO SERVIÇO
tela om detalhes do salão, quando selecionado o serviõ ele abre um modal para prosseguir.  
- [x] repete a fot empresa, descrição, categoria.
- [x] serviços e preços sendo botoes clicaveis, onde vau abrir um modal na mesma janela.


## TELA PARA AGENDAMENTO - (Modal bootstrap) 
- [x] cliente ja escolheu o servico no passo anterior.
- [x] Escolhe data sendo para os proximos 7 dias. 
- [x] campo de observaçoes, caso cliente queira informar algo a mais. 
- [x] verificação se aquele horario esta realmente dispoveis naquele salao.
- [x]resumo do agendamento com servico, valor, data escolhida e horario. 
- [x]botão confimrar agendamento, mostrando um alert que foi possivel ou nao realizar o agendamento. 



- Sistema Interno 
Sistema para acesso de um admin que cadastra empresas e os servicos da empresa.

## LOGIN SISTEMA INTERNO
- [x]campos para login e senha, com opção de mostrar senha. 

## TELA INICIAL INTERNO 
- [x]calendario ao lado esquerdo para melhor visualização do mes.
- [x]menu de navegação logo abaixo do calendario com botões cadastro de salão, cadastro de serviço, agenda e banco de clientes. 

## CADASTRO DE SERVIÇO 
- [x]campos com nome de serviço, categoria pre definida, valor, descrição do serviço 3 fotos.
- [x]lado direito com 3 campos para fotos desse serviço. 

## CADASTRO DE SALAO
- [x]Campos para preencher Razao social, nome fantasia, CNPJ, serviços, numero, cep, estado pre definido, cidade, rua complemento.
- [x]campo para adiconar fotos da empresa.

## BANCO CLIENTES
- [x] listar dados clientes cadastrados no banco.
- [x]apagar clientes cadastrados.

## AGENDA
- [x]listar todos os agendamentos.
- [x]deletar algum agendamento.




