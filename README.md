#web-base

#What?
Web-Base is a little project that tries to provide a basic PHP enviroment for developers.

It uses various technologies:
- [Vagrant](https://www.vagrantup.com/)
- [Ansible](http://www.ansible.com/)
- [VirtualBox](https://www.virtualbox.org/)
- PHP5
- [Composer](https://getcomposer.org/)
- [Twig](http://twig.sensiolabs.org/)
- [Assetic](https://github.com/kriswallsmith/assetic)

#How to devel?
- Download the zip file
- Decompress it
- Enter the directory
- `vagrant up`
- Point a browser to [10.0.0.100](http://10.0.0.100)
- Edit files in web directory

#How to deploy?
- Get the files into the server ( git / s3 / drive / ... )
- `bash install.sh -e server`

#How to change roles in server enviroment?
For the server install we use the setup_server.yml file instead of the setup_dev.yml one.
So you can change there whatever you need to be different in the server env.
Ex. do not install DDBB or Queue server.

