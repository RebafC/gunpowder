#!/usr/bin/php
<?php

// Require composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

if (!isset($argv[1])) {
	// Show usage
	die;
}

$testClass = ucfirst($argv[1]);
$testClassPath = getenv('HOME') . '/.gunpowder/' . $testClass . '.php';
if (!file_exists($testClassPath)) {
	// Show usage
	die;
}

require_once $testClassPath;
if (!class_exists($testClass)) {
	// Show usage
	die;
}

// Create new Guzzle client
$guzzle = new GuzzleHttp\Client();

// Create new Output client
$output = new Gunpowder\Output\TermColor();

// Create new Testclass
$testInstance = new $testClass($guzzle, $output);

// Run tests
$testInstance->run();

// Exit with correct exit status
exit ($testInstance->getExitStatus());

