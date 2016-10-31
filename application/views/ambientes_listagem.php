 <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Lista de Ambientes</h1>
                    </div>
                </div>
                <?php
                    // se houver uma variável de sessão definida irá exibir a mensagem
                    if ($this->session->has_userdata('mensa')) {
                    // obtém os valores atribuídos às variáveis de sessão
                    $mensa = $this->session->flashdata('mensa');
                    $tipo = $this->session->flashdata('tipo');
                
                    // if ($tipo==1)
                        if ($tipo) {
                            echo "<div class='alert alert-success'>";
                            echo "<strong>Successo!! </strong>" . $mensa; 
                            echo "</div>";
                        } else {
                            echo "<div class='alert alert-danger'>";
                            echo "<strong>Erro... </strong>" . $mensa; 
                            echo "</div>";
                        }                
                    }            
                ?>
                
                <!--Tabela Ambientes-->
               <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ambientes
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descrição</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ambientes as $ambiente) { ?>
                                            <tr>
                                                <td><?= $ambiente->id ?></td>
                                                <td><?= $ambiente->descricao ?></td>
                                                <td>
                                                    <a href="<?= base_url().'ambientes/alterar/'.$ambiente->id ?>">
                                                        <span class="glyphicon glyphicon-pencil" title="Alterar"></span></a> &nbsp;&nbsp; 
                                                    <a href="<?= base_url().'ambientes/desativar/'.$ambiente->id ?>">
                                                        <span class="glyphicon glyphicon-ban-circle" title="Desativar"></span></a> &nbsp;&nbsp;
                                                    <a href="<?= base_url().'ambientes/excluir/'.$ambiente->id ?>"
                                                        onclick="return confirm('Confirma Exclusão do Ambiente\'<?= $ambiente->descricao ?>\'?')">
                                                        <span class="glyphicon glyphicon-remove" title="Excluir"></span></a>&nbsp;&nbsp;
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
          
                <!--Tabela Desativados-->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Desativados
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descrição</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($desativados as $desativado) { ?>
                                            <tr>
                                                <td><?= $desativado->id ?></td>
                                                <td><?= $desativado->descricao ?></td>
                                                <td>  
                                                    <a href="<?= base_url().'ambientes/ativar/'.$desativado->id ?>">
                                                        <span class="glyphicon glyphicon-check" title="Ativar"></span></a> &nbsp;&nbsp;
                                                    <a href="<?= base_url().'ambientes/excluir/'.$desativado->id ?>"
                                                        onclick="return confirm('Confirma Exclusão do Ambiente\'<?= $desativado->descricao ?>\'?')">
                                                        <span class="glyphicon glyphicon-remove" title="Excluir"></span></a>&nbsp;&nbsp;

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

</body>
</html>

