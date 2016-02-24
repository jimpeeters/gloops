module.exports = function(grunt) {

  grunt.initConfig({
    sass: {                            
      dist: {                          
        files: {                        
          'public/resources/css/style.css': 'public/resources/css/style.scss'
        }
      }
    },
    watch: {
      css: {
        files: 'public/resources/css/**/*.scss',
        tasks: ['sass']
      }
    }
  });


  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-cssmin');

  grunt.registerTask('default',['watch']);
  

};