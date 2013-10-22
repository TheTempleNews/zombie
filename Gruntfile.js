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
          ]
        }
      }
    },
    cssmin: {
        minify: {
          expand: true,
          cwd: 'assets/css/',
          src: [
            '*.css',
            '!*.min.css'
          ],
          dest: 'assets/css/',
          ext: '.min.css'
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
    version: {
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
          'assets/scss/*.scss'
        ],
        tasks: ['compass', 'cssmin', 'version']
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
          livereload: false
        },
        files: [
          'assets/css/*.css',
          'assets/js/scripts.min.js',
          'assets/js/scripts-special-issues.min.js',
          'templates/*.php',
          '*.php'
        ]
      }
    },
    clean: {
      dist: [
        'assets/css/*.min.css',
        'assets/js/*.min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-wp-version');
  grunt.loadNpmTasks('grunt-notify');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'compass',
    'cssmin',
    'uglify',
    'version'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};
