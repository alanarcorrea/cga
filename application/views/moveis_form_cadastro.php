<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastro de Módulos</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formulário de Cadastro de Módulo
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post" action="<?= base_url('moveis/grava_cadastro') ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <input class="form-control" name="descricao" placeholder="Digite a descrição do módulo">

                                </div>
                                <div class="form-group">
                                    <label>Altura</label>
                                    <input class="form-control" name="altura" placeholder="Digite a altura do módulo">
                                </div>
                                <div class="form-group">
                                    <label>Largura</label>
                                    <input class="form-control" name="largura" placeholder="Digite a largura do módulo">
                                </div>
                                <div class="form-group">
                                    <label>Profundidade</label>
                                    <input class="form-control" name="profundidade" placeholder="Digite a profundidade do módulo">
                                </div>               
                                <div class="form-group">
                                    <label for="ambiente">Ambientes</label>
                                    <select class="form-control" name="ambientes_id">
                                        <option value=""> Selecione... </option>
                                            <?php foreach ($ambientes as $ambiente) { ?>
                                        <option value="<?= $ambiente->id ?>"> <?= $ambiente->descricao?> </option>                            
                                            <?php } ?>
                                    </select>                       
                                </div>                                       
                                <div class="form-group input-group">
                                    <span class="input-group-addon">R$</span>
                                    <input type="text" class="form-control" name="preco" placeholder="Digite o preço do módulo">
                                    <span class="input-group-addon">,00</span>
                                </div>                               
                                <!-- <div class="form-group">
                                    <label>Fotos</label>
                                    <input type="file" name="foto">
                                </div> -->                                       
                                <button type="submit" class="btn btn-default">Enviar</button>
                                <button type="reset" class="btn btn-default">Limpar</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

</body>
</html>