wp-start
========

wordpress starter theme

Purpose
=======

Barebones theme, from which to develop client sites.

Notes
=======

This theme is under heavy development.

Grunt tasks set up to speed up style development:
Default Grunt task will run compass in watch mode, and is configured
to generate debugging symbols. Upon update, livereload can refresh the
page.



The watch task is cool: It will watch for changes in your css and php.
When it sees them, it signals an update. This update can be caught by
the livereload extension:

https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei

Dependencies
============

Sass/compass

Grunt

Node modules required:

grunt
grunt-contrib-compass
grunt-contrib-watch

These deps have other deps: 
Sass requires a ruby environment. 
Grunt requires node and npm.
Figuring out how to set that stuff up is kinda challenging.

http://gruntjs.com

license
========

php in this repo touches the wordpress api. 
So they are are under GPL
http://wordpress.org/about/gpl/

Sass/css authored by me in this repo are under GPLv2

Sass not authored by me in this repo includes bourbon, and neat.
These are under the MIT License
https://github.com/thoughtbot/bourbon/blob/master/LICENSE
