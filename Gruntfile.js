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
    sass: {
      dist: {
        options: {
          style: 'compressed',
          compass: true
        },
        files: {
          'assets/css/main.min.css': [
            'assets/scss/main.scss'
          ],
          'assets/css/lunchies-2013.css': [
            'assets/scss/lunchies-2013.scss'
          ],
          'assets/css/reunion-2013.css': [
            'assets/scss/reunion-2013.scss'
          ]
        }
      },
      dev: {
        options: {
          style: 'expanded',
          compass: true,
          // Source maps are available, but require Sass 3.3.0 to be installed
          // https://github.com/gruntjs/grunt-contrib-sass#sourcemap
          sourcemap: false
        },
        files: {
          'assets/css/main.min.css': [
            'assets/scss/main.scss'
          ],
          'assets/css/lunchies-2013.css': [
            'assets/scss/lunchies-2013.scss'
          ],
          'assets/css/reunion-2013.css': [
            'assets/scss/reunion-2013.scss'
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
      // Soon to be replaced by `grunt-wp-assets`
      options: {
        file: 'lib/scripts.php',
        css: 'assets/css/main.min.css',
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
        tasks: ['sass:dev', 'version']
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
          'assets/css/*.css',
          'assets/js/scripts.min.js',
          'templates/*.php',
          '*.php'
        ]
      }
    },
    clean: {
      dist: [
        'assets/css/main.min.css',
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
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-wp-version');
  grunt.loadNpmTasks('grunt-notify');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'sass:dist',
    'uglify',
    'version',
    'grunticon'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};
