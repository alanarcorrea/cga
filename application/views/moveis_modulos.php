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

    <!--Tabela Módulos -->
               <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Módulos
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
    
    </body>
</html>