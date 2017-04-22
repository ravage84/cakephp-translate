<?php
/**
 * @var \App\View\AppView $this
 * @var \Translate\Model\Entity\TranslateString[] $translateStrings
 */
?>
<nav class="actions col-sm-4 col-xs-12">
	<ul class="side-nav nav nav-pills nav-stacked">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('New Translate String'), ['action' => 'add']) ?></li>
	</ul>
</nav>
<div class="translateStrings index col-sm-8 col-xs-12">
	<h3><?= __('Translate Strings') ?></h3>

	<?php
	echo $this->Form->create();
	// You'll need to populate $authors in the template from your controller
	echo $this->Form->input('translate_group_id', ['empty' => ' - ' . __('noLimitation') . ' - ']);
	echo $this->Form->input('search', ['placeholder' => '']);
	echo $this->Form->input('missing_translation', ['type' => 'checkbox', 'hiddenField' => '']);

	?>
	<div class="text-right" style="margin-bottom: 8px;">
		<?php
		echo $this->Form->button(__('Filter'), ['type' => 'submit']);
		if ($this->request->query) {
			echo ' ' . $this->Html->link(__('Reset'), ['action' => 'search'], ['class' => 'btn btn-default']);
		}
		?>
	</div>
	<?php
	echo $this->Form->end();
	?>

	<table class="table table-striped">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('name');?></th>
				<th><?= $this->Paginator->sort('active') ?></th>
				<th><?= $this->Paginator->sort('is_html') ?></th>
				<th><?= $this->Paginator->sort('plural') ?></th>
				<th><?= $this->Paginator->sort('context') ?></th>
				<th><?= $this->Paginator->sort('last_import', null, ['direction' => 'desc']) ?></th>
				<th><?= $this->Paginator->sort('created', null, ['direction' => 'desc']) ?></th>
				<th><?= $this->Paginator->sort('modified', null, ['direction' => 'desc']) ?></th>
				<th class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($translateStrings as $translateString): ?>
			<tr>
				<td>
					<?php echo h($this->Text->truncate($translateString['name'])); ?>
				</td>
				<td><?= $this->Format->yesNo($translateString->active) ?></td>
				<td><?= $this->Format->yesNo($translateString->is_html) ?></td>
				<td><?= $this->Format->yesNo($translateString->plural, ['title' => $translateString->plural]) ?></td>
				<td><?= $this->Format->yesNo($translateString->context, ['title' => $translateString->context]) ?></td>
				<td><?= $this->Time->nice($translateString->last_import) ?></td>
				<td><?= $this->Time->nice($translateString->created) ?></td>
				<td><?= $this->Time->nice($translateString->modified) ?></td>
				<td class="actions">
				<?php echo $this->Html->link($this->Format->icon('translate'), ['action'=>'translate', $translateString['id']], ['escape'=>false]); ?>
				<?= $this->Html->link($this->Format->icon('view'), ['action' => 'view', $translateString->id], ['escape' => false]); ?>
				<?= $this->Html->link($this->Format->icon('edit'), ['action' => 'edit', $translateString->id], ['escape' => false]); ?>
				<?= $this->Form->postLink($this->Format->icon('delete'), ['action' => 'delete', $translateString->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $translateString->id)]); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?php echo $this->element('Tools.pagination'); ?>
</div>
