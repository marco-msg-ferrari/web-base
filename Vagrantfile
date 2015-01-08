# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "ubuntu/trusty64"

  # support 32 windows hosts :(
  if ENV["PROCESSOR_ARCHITECTURE"] == "x86"
      puts "falling back to 32-bit guest architecture"
      config.vm.box = "ubuntu/trusty32"
  end

  config.vm.network :private_network, ip: "10.0.0.100"

  config.vm.provider :virtualbox do |vb|
    #   # Use VBoxManage to customize the VM. For example to change memory:
    vb.customize ["modifyvm", :id, "--memory", "1024"]
  end

  config.vm.provision "shell", path: "install.sh"

  config.vm.synced_folder ".", "/vagrant", owner:"vagrant", group:"www-data", mount_options:["dmode=775", "fmode=664"]
end
