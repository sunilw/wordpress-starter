wp-start
========

wordpress starter theme

Purpose
=======

Barebones theme, from which to develop client sites.

Notes
=======

In progress starter theme.

Grunt tasks set up to speed up style development:
Default Grunt task will run compass in watch mode, and is configured
to generate debugging symbols. Upon update, livereload can refresh the
page.

For viewing sass debug symbols in chrome: 
https://github.com/tinganho/SASS-Inspector

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