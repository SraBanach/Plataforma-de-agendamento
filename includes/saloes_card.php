<div class="col col-3">
    <a href="descricaoServico.php?consultar=true&id=<?= $descricao['id'] ?>" class="card-link">
    <a href="./includes/filmes_consultar.php <?= $value['id'] ?>"> 
        <figure class="card-imagem">
            <img src="../assets/img/beauty-salon.jpg<?php echo $descricao['fotoEmpresa1'] ?>" alt="foto salao de beleza" class="foto-salao">
            <figcaption class="card-salao">
                <h4><?php echo $descricao['nomeFantasia'] ?></h4>
                
                <!-- <p class="Endereco"> -->
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
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
