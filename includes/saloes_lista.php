<section id="saloes_recomendados">
    <h2 class="titulo"> Salões </h2>
    <main class="container">
        <div class="row">
            <!-- Col - 3 é para ocupar 3 colunas  -->

            
        <!-- for ($i=0; $i < 8 ; $i++)      -->
        <!-- se for colocar depois um filtro coloque aqui  -->
        <?php foreach ($dadosSaloes as $descricao) {  
                include './includes/saloes_card.php';
        } ?>
        </div>
    </main>
</section>