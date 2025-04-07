<div class="col col-3">
    <a href="descricaoServico.php?consultar=true&id=<?= $descricao['id'] ?>" class="card-link"> 
        <figure class="card-imagem">
        <img src="exibirImagem.php?id=<?= $descricao['id'] ?>&campo=fotoEmpresa1" alt="foto salao de beleza" class="foto-salao">
            <figcaption class="card-salao">
                <h4><?php echo $descricao['nomeFantasia'] ?></h4>
                
                <p class="Endereco"> 
                    <?php echo $descricao['rua'] ?> </td>
                    <?php echo $descricao['numero'] ?> </td><br>
                    <?php echo $descricao['cidade'] ?> </td>
                    <?php echo $descricao['estado'] ?> </td><br>
                </p>
                <ul class="avaliacoes-servico">
                    <span class="card-avaliacao">Avaliações:</span>
                    <li><i class="bi bi-star-fill"></i></li>
                    <li><i class="bi bi-star-fill"></i></li>
                    <li><i class="bi bi-star-half"></i></li>
                    <li><i class="bi bi-star"></i></li>
                    <li><i class="bi bi-star"></i></li>
                </ul>
            </figcaption>
        </figure>
    </a>
</div>


