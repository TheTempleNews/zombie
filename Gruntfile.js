'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/_*.js',
        'assets/js/special-issues/_*.js'
      ]
    },
    compass: {
      dist: {
        options: {
          specify: [
            'assets/scss/*.scss',
            '!csswizardry-grids.scss'
          ],
          environment: 'production',
          outputStyle: 'compressed'
        }
      },
      dev: {
        options: {
          specify: [
            'assets/scss/*.scss',
            '!csswizardry-grids.scss'
          ]
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'assets/js/scripts.min.js': [
            'assets/js/plugins/*.js',
            'assets/js/_*.js'
          ],
          'assets/js/scripts-special-issues.min.js': [
            'assets/js/special-issues/*.js'
          ]
        }
      }
    },
    grunticon: {
      icons: {
        options: {
          src: "assets/img/icons/dist",
          dest: "assets/img/icons/",
          colors: {
            white: "white"
          }
        }
      }
    },
    version: {
      options: {
        file: 'lib/scripts.php',
        css: 'assets/css/main.css',
        cssHandle: 'zombie-main',
        js: 'assets/js/scripts.min.js',
        jsHandle: 'zombie-scripts'
      }
    },
    watch: {
      scss: {
        files: [
          'assets/scss/**/*.scss'
        ],
        tasks: ['compass:dev', 'version']
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'uglify', 'version']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: true
        },
        files: [
          'assets/css/*.css'
        ]
      }
    },
    clean: {
      dist: [
        'assets/css/main.css',
        'assets/js/*.min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-grunticon');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-wp-version');
  grunt.loadNpmTasks('grunt-notify');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'compass:dist',
    'uglify',
    'version',
    'grunticon'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};
