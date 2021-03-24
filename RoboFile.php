<?php
require('.robo/vendor/autoload.php');

use \Robo\Tasks;

use \JmartzGmbh\RoboConfig;

class RoboFile extends Tasks{

    use RoboConfig;

    public function checkBuild(){
        return 'success';
    }

    public function roboInstall(){
        $this->_exec('cd .robo && composer install');
    }

    public function composerInstall(){
        $this->_exec('cd src && composer install');
    }

    public function deploy(){
        $config = $this->ConfigLoad('anton-config');

        $user = $config['server']['user'];
        $host = $config['server']['host'];
        $domain = $config['server']['domain'];
        $tmp = date('d-m-Y-H-i');

        $this->taskRsync()
            ->fromPath('./src/')
            ->toHost($host)
            ->toUser($user)
            ->excludeVcs()
            ->toPath('/var/www/' . $domain .'/releases/'.$tmp)
            ->recursive()
            ->run();

        $this->taskSshExec($host, $user)
        ->remoteDir('/var/www/' . $domain.'/releases')
        ->exec('rm -rf current')
        ->exec('mv '.$tmp.' current')
        // ->exec('rm -rf '.$tmp)
        ->run();

        // fix permission
        $this->taskSshExec($host, $user)
        ->remoteDir('/var/www/' . $domain.'/releases/')
        ->exec('chown -R www-data:www-data .')
        ->run();

        // delete old versions
    }

    public function publishVersion(){
        $config = $this->ConfigLoad('anton-config');

        $user = $config['server']['user'];
        $host = $config['server']['host'];
        $domain = $config['server']['domain'];
        $tmp = date('d-m-Y-H-i');

        // Link env
        $this->taskSshExec($host, $user)
        ->remoteDir('/var/www/' . $domain.'/releases/current')
        ->exec('ln -s ../../shared/.env')
        ->run();
    }
}