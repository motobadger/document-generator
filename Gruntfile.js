module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            sass: {
                files: "scss/**/*.scss",
                tasks: ['sass']
            }
        },
        sass: {
            dev: {
                files: {
                    "css/style.css" : "scss/style.scss"
                }
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default',['watch']);
}