module.exports = function(grunt) {
    grunt.initConfig({

        compass: {
            dist: {
                options : {		    
                    sassDir: 'sass',
                    cssDir: 'css',
                    debugInfo: true
                }
            }
        },

        watch: {
            files: ['css/*.css', '*.php', 'templates/*.php', 'sass/*'],
	    tasks : ['compass'],
            options : {
                livereload: true,
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.registerTask('default', ['watch', 'compass']);

}