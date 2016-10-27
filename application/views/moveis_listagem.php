 <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Lista de Módulos</h1>
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
                <!--Tabela Destaques-->
               <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Destaques
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descrição</th>
                                            <th>Ambiente</th>
                                            <th>Altura</th>
                                            <th>Largura</th>
                                            <th>Profundidade</th>
                                            <th>Preço</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($destaques as $destaque) { ?>
                                            <tr>
                                                <td><?= $destaque->id ?></td>
                                                <td><?= $destaque->descricao ?></td>
                                                <td><?= $destaque->ambiente ?></td>
                                                <td><?= $destaque->altura ?></td>
                                                <td><?= $destaque->largura ?></td>
                                                <td><?= $destaque->profundidade ?></td>
                                                <td><?= $destaque->preco ?></td>
                                                <td> 
                                                    <a href="<?= base_url().'moveis/alterar/'.$destaque->id ?>">
                                                        <span class="glyphicon glyphicon-pencil" title="Alterar"></span></a> &nbsp;&nbsp;
                                                    <a href="<?= base_url().'moveis/esconder/'.$destaque->id ?>">
                                                        <span class="glyphicon glyphicon-heart-empty" title="Esconder"></span></a> &nbsp;&nbsp;
                                                    <a href="<?= base_url().'moveis/desativar/'.$destaque->id ?>">
                                                        <span class="glyphicon glyphicon-ban-circle" title="Desativar"></span></a> &nbsp;&nbsp;
                                                    <a href="<?= base_url().'moveis/excluir/'.$destaque->id ?>"
                                                        onclick="return confirm('Confirma Exclusão do Módulo\'<?= $destaque->descricao ?>\'?')">
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
                
                <!--Tabela Outros Móveis-->
               <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Outros Módulos
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descrição</th>
                                            <th>Ambiente</th>
                                            <th>Altura</th>
                                            <th>Largura</th>
                                            <th>Profundidade</th>
                                            <th>Preço</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($moveis as $movel) { ?>
                                            <tr>
                                                <td><?= $movel->id ?></td>
                                                <td><?= $movel->descricao ?></td>
                                                <td><?= $movel->ambiente ?></td>
                                                <td><?= $movel->altura ?></td>
                                                <td><?= $movel->largura ?></td>
                                                <td><?= $movel->profundidade ?></td>
                                                <td><?= $movel->preco ?></td>
                                                <td>
                                                    <a href="<?= base_url().'moveis/alterar/'.$movel->id ?>">
                                                        <span class="glyphicon glyphicon-pencil" title="Alterar"></span></a> &nbsp;&nbsp; 
                                                    <a href="<?= base_url().'moveis/destacar/'.$movel->id ?>">
                                                        <span class="glyphicon glyphicon-heart" title="Destacar"></span></a> &nbsp;&nbsp;
                                                    <a href="<?= base_url().'moveis/desativar/'.$movel->id ?>">
                                                        <span class="glyphicon glyphicon-ban-circle" title="Desativar"></span></a> &nbsp;&nbsp;
                                                    <a href="<?= base_url().'moveis/excluir/'.$movel->id ?>"
                                                        onclick="return confirm('Confirma Exclusão do Módulo\'<?= $movel->descricao ?>\'?')">
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
                                            <th>Ambiente</th>
                                            <th>Altura</th>
                                            <th>Largura</th>
                                            <th>Profundidade</th>
                                            <th>Preço</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($desativados as $desativado) { ?>
                                            <tr>
                                                <td><?= $desativado->id ?></td>
                                                <td><?= $desativado->descricao ?></td>
                                                <td><?= $desativado->ambiente ?></td>
                                                <td><?= $desativado->altura ?></td>
                                                <td><?= $desativado->largura ?></td>
                                                <td><?= $desativado->profundidade ?></td>
                                                <td><?= $desativado->preco ?></td>
                                                <td>  
                                                    <a href="<?= base_url().'moveis/ativar/'.$desativado->id ?>">
                                                        <span class="glyphicon glyphicon-check" title="Ativar"></span></a> &nbsp;&nbsp;
                                                    <a href="<?= base_url().'moveis/excluir/'.$desativado->id ?>"
                                                        onclick="return confirm('Confirma Exclusão do Módulo\'<?= $desativado->descricao ?>\'?')">
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

