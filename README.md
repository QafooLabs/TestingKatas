# Workshop Testing Setup

Please make sure that you have a working setup of:

* PHP 5.3 (or newer)
* PHPUnit 3.7 (or newer)
* A Git client

## Links

* http://www.phpunit.de/manual/current/en/installation.html
* http://git-scm.com/downloads

## Vagrant setup

For those who are interested there is a vagrant setup available (optional).
Just follow these steps to get up and running with your own Virtual environment.

* Install [Virtualbox](https://www.virtualbox.org/) and [Vagrant](http://www.vagrantup.com)
* From the root of this git repository run `vagrant up` and wait for the VM to boot and provision
* Ssh into the VM by running `vagrant ssh` and switch to the `/vagrant` directory

Once in the virtual machine you can find all files in `/vagrant`, this is actually the folder on your machine (the host) you ran the `vagrant up` command from, mounted into the Virtual machine. All changes made to files inside this directory on your computer will reflect immediately on the Virtual machine. This makes that you can run PHPUnit on the VM through an ssh session while still being able to edit the files on your computer with your favourite editor or IDE.

To test if all is installed correct run `phpunit test/` from the `/vagrant` folder in your VM.

## Rules

* Create a simple String calculator with a method int Add(string numbers)
  * The method can take 0, 1 or 2 numbers, and will return their sum (for an empty string it will
    return 0) for example "" or "1" or "1,2"
  * Start with the simplest test case of an empty string and move to 1 and two numbers
  * Remember to solve things as simply as possible so that you force yourself to write tests you did
    not think about
  * Remember to refactor after each passing test

* Allow the Add method to handle an unknown amount of numbers

* Allow the Add method to handle new lines between numbers (instead of commas).
  * the following input is ok:  "1\n2,3"  (will equal 6)
  * the following input is NOT ok:  "1,\n" (not need to prove it - just clarifying)

* Support different delimiters to change a delimiter, the beginning of the
  string will contain a separate line that looks like this:
  "//[delimiter]\n[numbers"]" for example "//;\n1;2" should return three where
  the default delimiter is ";" .  the first line is optional. all existing
  scenarios should still be supported

* Calling Add with a negative number will throw an exception "negatives not
  allowed" - and the negative that was passed.  if there are multiple
  negatives, show all of them in the exception message

