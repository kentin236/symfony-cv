<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude(__DIR__.'/src/Kernel.php')
    ->exclude('/var')
    ->exclude('/vendor')
    ->in(__DIR__ .'/src')
    ->in(__DIR__ .'/tests')
;

$config = new PhpCsFixer\Config();
return $config->setRules([
    '@Symfony' => true,
    '@PSR2' => true,
    '@PhpCsFixer' => true,
    'array_syntax' => ['syntax' => 'short'],
    'no_superfluous_phpdoc_tags' => false,
    'binary_operator_spaces' => ['align_double_arrow' => true],
    'braces' => ['allow_single_line_closure' => true],
    'class_definition' => ['single_line' => true],
    'increment_style' => ['style' => 'post'],
    'logical_operators' => true,
    'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
    'blank_line_before_statement' => ['statements' => ['return', 'throw']],
    'ordered_imports' => ['sort_algorithm' => 'length'],
    'php_unit_method_casing' => ['case' => 'snake_case'],
    'yoda_style' => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
])->setFinder($finder)->setCacheFile(__DIR__.'/.php_cs.cache');
