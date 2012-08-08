<?php
App::uses('FormHelper', 'View/Helper');

class BootstrapFormHelper extends FormHelper {
	private $defaultCreate = array(
		'inputDefaults' => array(
			'div' => array(
				'class' => 'control-group',
			),
			'error' => array(
				'attributes' => array(
					'wrap' => 'span',
					'class' => 'help-inline',
				),
			),
			'between' => '<div class="controls">',
			'after' => '</div>',
			'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
			'label' => array('class' => 'control-label'),
		),
		'class' => 'form-horizontal',
	);
	
	private $defaultEnd = array(
		'div' => array(
			'class' => 'form-actions',
		),
		'class' => 'btn btn-success',
	);
	
	public function create($model = null, $options = array()) {
		if (!isset($options['useDefaults'])) {
			$options = array_merge($this->defaultCreate, $options);
		}
		return parent::create($model, $options);
	}
	
	public function smallInput($fieldName, $options = array()) {
		$defOptions = array(
			'label' => false,
			'class' => 'input-small',
			'div' => false,
			'between' => '',
			'after' => '',
		);
		$options = array_merge($defOptions, $options);
		return $this->input($fieldName, $options);
	}
	
	public function end($options = null) {
		if (!is_array($options) || !isset($options['useDefaults'])) {
			if ($options && is_string($options)) {
				$options = array(
					'label' => $options,
				);
			}
			if ($options && is_array($options)) {
				$options = array_merge($this->defaultEnd, $options);
			}
		}
		return parent::end($options);
	}
}