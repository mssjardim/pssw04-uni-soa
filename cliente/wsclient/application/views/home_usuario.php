<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>
<div class="container">

	<div class="row">
		<div class="col-lg-8 col-md-offset-2">
			<h2>Ol&aacute; <?php echo (isset($nome)? $nome : '') ; ?> :)</h2>
			<?php if($this->session->flashdata('addOK')):?>
				<p><?php echo $this->session->flashdata('addOK');?> </p>
			<?php endif; ?>
			<div class="panel panel-default">
				<!-- Default panel contents -->

				<div class="panel-heading">
					<span class="col-md-10">Lembretes </span> <span
						class="col-md-2">
						<button type="submit" onclick="location.href = '../lembrete/'"
							class="btn-xs btn-primary pull-right" name="confirmar"
							value="confirmar">Novo</button>
					</span>
				</div>
				<!-- Table -->
				<?php
				if (!empty( $lembrete )) :
					$cont = count ( $lembrete );
				?>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>T&iacute;tulo</th>
							<th>Data/Hora</th>
							<th>A&ccedil;ao</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$row = 1;
					if ($cont > 1) :
						foreach ( $lembrete as $value ) :
							?>				
						<tr>
							<th scope="row"><?php echo $row++; ?></th>
							<td><?php echo $value->titulo; ?></td>
							<td><?php echo @$value->data; ?></td>
							<td><a
								href="../lembrete/editar/<?php echo $value->idlembrete; ?>"
								title="Editar lembrete"> <span class="label label-success"
									style="margin-right: 5px;"> <span
										class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</span>
							</a> <a
								href="../lembrete/excluir/<?php echo $value->idlembrete; ?>"
								title="Excluir lembrete"> <span class="label label-danger"> <span
										class="glyphicon glyphicon-trash" aria-hidden="true"></span>
								</span>
							</a></td>
						</tr>
					<?php
						endforeach
						;
					 else :
						?> 
					<tr>
							<th scope="row"><?php echo $row++; ?></th>
							<td><?php echo $lembrete->titulo; ?></td>
							<td><?php echo $lembrete->data; ?></td>
							<td><a
								href="../lembrete/editar/<?php echo $lembrete->idlembrete; ?>"
								title="Editar lembrete"> <span class="label label-success"
									style="margin-right: 5px;"> <span
										class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</span>
							</a> <a
								href="../lembrete/excluir/<?php echo $lembrete->idlembrete; ?>"
								title="Excluir lembrete"> <span class="label label-danger"> <span
										class="glyphicon glyphicon-trash" aria-hidden="true"></span>
								</span>
							</a></td>
						</tr>
					<?php endif;?>
					</tbody>
				</table>
				 <?php
				endif;
				?> 
			</div>

		</div>
	</div>
</div>