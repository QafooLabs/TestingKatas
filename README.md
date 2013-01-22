# Workshop Testing Setup

Please make sure that you have a working setup of:

* PHP 5.3 (or newer)
* PHPUnit 3.7 (or newer)
* A Git client

Links:

* http://www.phpunit.de/manual/current/en/installation.html
* http://git-scm.com/downloads

# Vagrant setup

For those who are interested there is a vagrant setup available. Just follow these steps to get up and running with your own Virtual environment.

* Install [Virtualbox](https://www.virtualbox.org/) and [Vagrant](http://www.vagrantup.com)
* From the root of this git repository run `vagrant up` and wait for the VM to boot and provision
* Ssh into the VM by running `vagrant ssh` and switch to the `/vagrant` directory

Once in the virtual machine you can find all files in `/vagrant`, this is actually the folder on your machine (the host) you ran the `vagrant up` command from, mounted into the Virtual machine. All changes made to files inside this directory on your computer will reflect immediately on the Virtual machine. This makes that you can run PHPUnit on the VM through an ssh session while still being able to edit the files on your computer with your favourite editor or IDE.

To test if all is installed correct run `phpunit test/` from the `/vagrant` folder in your VM.
