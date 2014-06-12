WHAT
====

This is an effort to run an PHP app in a linux namespace, separated from all other stuff.

As soon as the uwsgi process starts, it will unshare the filesystem (fs) namespace, create a tmpfs filesystem for a
root, bind mount (readonly) /usr, %d/app and %d/static from the app, and create some helpful symlinks.

The structure of the tmpfs root system is:

    /app - readonly bind mount of ./app, the php code is here
    /static - readonly bind mount of ./static, static files go here
    /usr - readonly bind mount of the system /usr
    /bin - symlink to /usr/bin
    /lib - symlink to /usr/lib
    /lib64 - symlink to /usr/lib, needed for 64bit architectures
    /dev - mounted /dev, but can be static too, /dev/null, random, zero are needed perhaps
    /proc - /proc for testing, production could work without it


USAGE
=====

    sudo uwsgi --ini uwsgi.ini

sudo is required for the namespacing stuff (also see TODO)


TODO
====

 - stderr
 - long running bash in a pty
 - blinking cursor
 - net namespace, need for the listening socket to exit the net namespace (unix/abstract sockets?)
 - pid namespace fails
 - "user namespaces" so no need for sudo
 - --emperor-use-clone
 - fix/document reloading problem
