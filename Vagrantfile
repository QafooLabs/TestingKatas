# Base Vagrant config for Nucleus Puppet

Vagrant::Config.run do |config|
  config.vm.box      = "precise64"
  config.vm.box_url  = "http://files.vagrantup.com/precise64.box"

  config.vbguest.auto_update = false

  config.vm.define :master do |master_config|
    master_config.vm.host_name = "testablecode.workshop.phpbenelux.eu"
    master_config.vm.forward_port 9999,9999
    master_config.vm.forward_port 443,8081
    master_config.vm.forward_port 80,8080
    master_config.vm.provision :puppet do |puppet|
      puppet.manifests_path = "vm"
      puppet.manifest_file = "main.pp"
      puppet.options = ['--verbose']
    end
  end

  config.vm.customize ["modifyvm", :id, "--memory", 1024]
end
