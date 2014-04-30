module.exports = function(grunt){

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        less: {
          development: {
            options: {
              paths: ["css"]
            },
            files: {
              "css/app.css": "css/app.less",
              "css/c_v1.css": "css/c_v1.less"
            }
          }
        },
        cssmin: {
          combine: {
            files: {
              'css/app_version1.css': ['css/app.css', 'css/c_v1.css']
            }
          }
        },
        uglify: {
            build: {
              files: {
                'js/app_version1.js': ['js/pjax.js', 'js/nprogress.js', 'js/app.js' ,'js/loggedin.js']
              }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.registerTask('default', ['less', 'cssmin', 'uglify']);
};
