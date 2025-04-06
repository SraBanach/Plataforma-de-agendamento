<?php
// porque a CLASSE é importante: quando tem a mesma linha de codigo no projeto, podendo ser ultilizado a classe; 
//como por exemplo a conexao com o banco, ele padroniza e deixa tudo em um arquivo só; 
//deixando funçoes ali dentro, agrupar tudo e deixa funcional 
// uma classe para cada tabela do nosso banco 
// classe é um conjunto de funçoes 
//responsavel que controla tudo sobre o assunto que aqui no caso é saloes;
// a classe sempre comeca com letra maiuscula para saber que é uma classe; 
class Saloes{
//função para listar os saloes, ser declarado sempre dentro das chaves; 
//imagine classe como gavetas e a function são os itens dentro da gaveta ex: garfo, faca, colher.. dentro de uma mesma gaveta;
//como ultiliza: 
//index: sempre deixo antes do include que vai precisar dele; 
// chamar a classe: 
//nomedocomponente

//quando tem parametro sem valor ele é obrigatorio, mas se tem valor vazio ai sim pode ser opcional; 
//aqio no caso entao $limite não é obrigatorio, assim funciona mesmo sem parametros;
//posso passar parametros diferentes em paginas diferentes; 

public $conexaoBanco;


//toda vez que eu chamar qualquer funcao abaixo, ele vai fazer o construct
//construi para o site todo.
//criar uma variavel global e posso ultilizar ela durante todo o meu site. 
public function __construct(){

    $dsn = 'mysql:dbname=db_plataformaagendamento;host=127.0.0.1';
    $user = 'root';
    $password = '';

    //conexao com o banco, se estiver como variavel ele cria um novo por estar dentro de uma funcao.
    //então para conectar a variavel public acima ele precisa do this; 
    // this para avisar de onde esta vindo a conexao com o banco
    $this->conexaoBanco = new PDO($dsn, $user, $password);
}



    public function exibirListaSaloes ($limite ='') { 

        //auxilio para a minha condição do if
        $auxScript = '';

        //criar as regas sempre entre o banco e o script

        //se estiver diferente de vazio ele segue essa regra aqui...
        if (!empty($limite)){ 
            //complementar o script abaixo... 
            //order by rand é para ficar de forma aleatoria as fotos
            $auxScript = " ORDER BY RAND() LIMIT {$limite}";
        }

        //. para contatenar
        $script = 'SELECT* FROM tb_cad_empresas' .$auxScript;

        return $this->conexaoBanco->query($script)->fetchAll();
    }


    public function filtrarPorCategoria($categoria) {
        $sql = "SELECT * FROM tb_cad_empresas WHERE servicos LIKE :categoria";
        $stmt = $this->conexaoBanco->prepare($sql);
        $stmt->bindValue(':categoria', "%$categoria%");
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    
}
