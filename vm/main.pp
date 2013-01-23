Exec {
    path => [ '/bin/', '/sbin/' , '/usr/bin/', '/usr/sbin/' ]
}

node default {
    file { "/etc/resolvconf/resolv.conf.d/head":
        owner   => root,
        group   => root,
        mode    => 644,
        ensure  => present,
        source  => "/vagrant/vm/resolv.conf.head",
        notify  => Exec["resolvconf-update"],
        alias   => "resolve-conf-head",
    }

    exec { "resolvconf-update":
        refreshonly => true,
        command     =>"resolvconf -u",
        path        => "$::path",
        logoutput   => "on_failure",
    }
    
    exec { 'update': 
        command => 'apt-get update',
        require => File["/etc/resolvconf/resolv.conf.d/head"]
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

