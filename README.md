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

```php
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
```

#### 2.3.3 Run your tests!

In your terminal:

	gunpowder Test

You should now see the results of your tests. As a bonus, the script will end with exit status 0 if all tests passed, and with exit status 1 if some tests failed.

The output will look a bit like this:

	$ gunpowder Test
	test the github page
	> https://github.com/turanct/gunpowder
		✔︎ Response code is 200
		✔︎ Body contains "gunpowder"

#### 2.3.4 Autocompletion

To install autocompletion support for bash on OSX:

	ln -s /usr/local/gunpowder/autocompletion.sh /usr/local/etc/bash_completion.d/gunpowder



3. License
----------------------------------------

Gunpowder is licensed under the *MIT License*
