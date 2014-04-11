# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

    # Use the precise32 box
    config.vm.box = "hashicorp/precise32"

    # Access guest via 7000
    config.vm.network :forwarded_port, host: 7000, guest: 80

    # Provision with the provision.sh script in project root
    config.vm.provision :shell, :path => "provision.sh"

    # Configure the shared folder
    config.vm.synced_folder ".", "/vagrant", owner: 'vagrant', group: 'www-data', mount_options: ["dmode=775,fmode=664"]

end