Gunpowder
========================================

A simple PHP smoke-testing framework


1. Goals & Accomplishments
----------------------------------------

### 1.1 Goals

- Quickly write tests to smoke-test a web application
- Easy syntax
- Execute the tests from anywhere on your system


2. Getting started
----------------------------------------

### 2.1 Requirements

- php 5.4


### 2.2 Installation

Use this command to install Gunpowder on your system:

	git clone https://github.com/turanct/gunpowder.git /usr/local/gunpowder && cd /usr/local/gunpowder && curl -sS https://getcomposer.org/installer | php && php composer.phar install && ln -s /usr/local/gunpowder/gunpowder.php /usr/local/bin/gunpowder && cd -


### 2.3 Usage

#### 2.3.1 Prepare gunpowder directory

create a directory for gunpowder tests

	mkdir ~/.gunpowder

#### 2.3.2 Create your first test class

Create a new file & write to it:

	vim ~/.gunpowder/Test.php

A test class looks like this:

	<?php

	class Test extends Gunpowder\SmokeTest
	{
		public function test_the_github_page()
		{
			$this->visit('https://github.com/turanct/gunpowder');
			$this->assertResponseCode(200);
			$this->assertBodyContains('gunpowder');
		}
	}


### 3. License

Gunpowder is licensed under the *MIT License*
