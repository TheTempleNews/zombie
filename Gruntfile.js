'use strict';
module.exports = function(grunt) {
	// Load all tasks
	require('load-grunt-tasks')(grunt);
	// Show elapsed time
	require('time-grunt')(grunt);

	var jsMainFileList = [
		'library/js/libs/jquery.fitvids.js',
		'library/js/libs/jquery.fittext.js',
		'library/js/libs/jquery.slabtext.js',
		'library/js/scripts.js'
	];

	grunt.initConfig({
		jshint: {
			options: {
				jshintrc: '.jshintrc'
			},
			all: [
				'Gruntfile.js',
				'library/js/*.js',
				'!library/**/*.min.*'
			]
		},
		less: {
			dev: {
				files: {
					'library/css/style.css': [
						'library/less/style.less'
					]
				},
				options: {
					compress: false,
					// LESS source map
					// To enable, set sourceMap to true and update sourceMapRootpath based on your install
					sourceMap: true,
					sourceMapFilename: 'library/css/style.css.map',
					sourceMapRootpath: '/wp-content/themes/zombie/'
				}
			},
			build: {
				files: {
					'library/css/style.css': [
						'library/less/style.less'
					]
				},
				options: {
					compress: true
				}
			}
		},
		sass: {
			dev: {
				options: {
					style: 'expanded'
				},
				files: {
					'library/css/reunion-2013.css': ['library/scss/reunion-2013.scss'],
					'library/css/lunchies-2013.css': ['library/scss/lunchies-2013.scss']
				}
			},
			build: {
				options: {
					style: 'compressed',
				},
				files: {
					'library/css/reunion-2013.css': ['library/scss/reunion-2013.scss'],
					'library/css/lunchies-2013.css': ['library/scss/lunchies-2013.scss']
				}
			}
		},
		uglify: {
			dev: {
				options: {
					beautify: true,
					compress: false,
					mangle: false,
					preserveComments: 'all',
					report: false,
				},
				files: {
					'library/js/scripts.min.js': [jsMainFileList],
					'library/js/scripts-lunchies-2013.min.js': ['library/js/scripts-lunchies-2013.js'],
					'library/js/scripts-reunion-2013.min.js': ['library/js/scripts-reunion-2013.js'],
				}
			},
			build: {
				files: {
					'library/js/scripts.min.js': [jsMainFileList],
					'library/js/scripts-lunchies-2013.min.js': ['library/js/scripts-lunchies-2013.js'],
					'library/js/scripts-reunion-2013.min.js': ['library/js/scripts-reunion-2013.js'],
				}
			}
		},
		autoprefixer: {
			options: {
				browsers: ['last 2 versions', 'ie 8', 'ie 9', 'android 2.3', 'android 4', 'opera 12']
			},
			dev: {
				options: {
					map: {
						prev: 'library/css/'
					}
				},
				src: 'library/css/style.css'
			},
			build: {
				src: 'library/css/style.css'
			}
		},
		watch: {
			less: {
				files: [
					'library/less/*.less',
					'library/less/**/*.less'
				],
				tasks: ['less:dev', 'autoprefixer:dev']
			},
			js: {
				files: [
					jsMainFileList,
					'<%= jshint.all %>'
				],
				tasks: ['jshint', 'concat']
			},
			livereload: {
				// Browser live reloading
				// https://github.com/gruntjs/grunt-contrib-watch#live-reloading
				options: {
					livereload: false
				},
				files: [
					'library/css/style.css',
					'library/js/scripts.min.js',
					'templates/*.php',
					'*.php'
				]
			}
		}
	});

	// Register tasks
	grunt.registerTask('default', [
		'dev'
	]);
	grunt.registerTask('dev', [
		'jshint',
		'less:dev',
		'sass:dev',
		'autoprefixer:dev'
	]);
	grunt.registerTask('build', [
		'less:build',
		'sass:build',
		'autoprefixer:build',
		'uglify'
	]);
};
