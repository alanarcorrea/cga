<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastro de Ambientes</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Formulário de Cadastro de Ambiente
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post" action="<?= base_url('ambientes/grava_cadastro') ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <input class="form-control" name="descricao" placeholder="Digite a descrição do ambiente">
                                </div>
                                <div class="form-group">
                                    <label>Sigla</label>
                                    <input class="form-control" name="sigla" placeholder="Digite a sigla do ambiente">
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