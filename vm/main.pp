Exec {
    path => [ '/bin/', '/sbin/' , '/usr/bin/', '/usr/sbin/' ]
}

node default {
    
    exec { 'update': 
        command => 'apt-get update'
    }

    package { ['php5', 'git-core', 'vim'] :
        ensure => installed,
        require => Exec['update']
    }

    package { 'php-pear' :
        ensure => installed,
        require => Package['php5']
    }

    exec { 'pear-channels' : 
        command => 'pear upgrade pear && pear channel-discover pear.phpunit.de && pear config-set auto_discover 1',
        require => Package['php-pear']
    }

    exec { 'phpunit' :
        command => 'pear install pear.phpunit.de/PHPUnit',
        require => Exec['pear-channels'],
        onlyif => 'pear list pear.phpunit.de/PHPUnit | grep "not installed"'
    }

    # Bash coloring
    file { ['/root/.bash_profile', '/home/vagrant/.bash_profile'] : 
        source => '/vagrant/vm/bash/.bash_profile'
    }
    file { ['/root/.bash_profile_colors', '/home/vagrant/.bash_profile_colors'] :
        source => '/vagrant/vm/bash/.bash_profile_colors'
    }
    file { ['/root/.bashrc', '/home/vagrant/.bashrc'] :
        source => '/vagrant/vm/bash/.bashrc'
    }

}
