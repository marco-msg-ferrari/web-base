#!/bin/bash

env='dev' # tandard enviroment
while getopts ":e:" optname
do
    case "$optname" in
        "e")
            env=$OPTARG
        ;;
    esac
done

#if ansible is not installed
if [ $(dpkg-query -W -f='${Status}' ansible 2>/dev/null | grep -c "ok installed") -eq 0 ];
then
    echo "Installing Ansible"
    sudo apt-add-repository -y ppa:ansible/ansible
    sudo apt-get update
    sudo apt-get install -y ansible
else
    echo "Ansible found"
fi

if [ "$env" = "server" ]; then
    ansible-playbook  setup_server.yml
else
    cd /vagrant/
    ansible-playbook  setup_dev.yml
fi
