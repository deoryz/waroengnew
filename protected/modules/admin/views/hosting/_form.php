<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'hosting-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>

	<?php echo $form->dropDownListRow($model,'group',array(
		'Personal'=>'Personal',
		'Profesional'=>'Profesional',
	)); ?>

	<?php echo $form->textFieldRow($model,'paket_name',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->dropDownListRow($model,'status',array(
		'1'=>'Aktif',
		'0'=>'Tidak Aktif',
	)); ?>

	<div class="grid-view">
		<table class="table table-border">
			<tr>
				<th>Name</th>
				<th>Periode (Bulan)</th>
				<th>Price</th>
				<th>&nbsp;</th>
			</tr>
			<?php if ($model->scenario == 'update' && count($modelPrice)>0): ?>
			<tbody class="price-edit-data">
				<?php foreach ($modelPrice as $key => $value): ?>
				<tr class="filters">
					<td>
						<div class="filter-container">
							<input type="hidden" name="hostingPrice[id][]" value="<?php echo $value->id ?>">
							<input type="hidden" name="hostingPrice[updt][]" value="1">
							<input type="text" name="hostingPrice[name][]" value="<?php echo $value->name ?>">
						</div>
					</td>
					<td>
						<div class="filter-container">
							<input type="text" name="hostingPrice[periode][]" value="<?php echo $value->periode ?>">
						</div>
					</td>
					<td>
						<div class="filter-container">
							<input type="text" name="hostingPrice[price][]" value="<?php echo $value->price ?>">
						</div>
					</td>
					<td><a href="#" class="btn btn-primary delete-data">Delete</a></td>
				</tr>
				<?php endforeach ?>
			</tbody>
			<?php endif ?>
			<tbody class="price-data">
				<tr class="filters">
					<td>
						<div class="filter-container">
							<input type="hidden" name="hostingPrice[id][]" value="">
							<input type="hidden" name="hostingPrice[updt][]" value="0">
							<input type="text" name="hostingPrice[name][]" value="">
						</div>
					</td>
					<td>
						<div class="filter-container">
							<input type="text" name="hostingPrice[periode][]" value="">
						</div>
					</td>
					<td>
						<div class="filter-container">
							<input type="text" name="hostingPrice[price][]" value="">
						</div>
					</td>
					<td><a href="#" class="btn btn-primary delete-data">Delete</a></td>
				</tr>
			</tbody>
		</table>
	</div>
	<a href="#" class="btn btn-primary price-add">Tambah</a>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
	$(document).ready(function() {
		var priceHtml = $('.price-data').html();
		$('.delete-data').live('click', function() {
			$(this).parent().parent().remove();
			return false;
		})
		$('.price-add').live('click', function () {
			$('.price-data').append(priceHtml);
			return false;
		})
	})
</script>
