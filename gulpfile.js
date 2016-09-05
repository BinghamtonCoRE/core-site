var browserify = require('browserify');
var gulp = require('gulp');
var glob = require('glob');
var reactify = require('reactify');
var source = require('vinyl-source-stream');
var shell = require('gulp-shell');

/*
  gulp browserify:

  Bundles all .js files in the /js/ directory into one file in /build/bundle.js
  that will be imported onto all pages
*/

gulp.task('browserify', function() {
	  var files = glob.sync('./js/**/*.js');
    var b = browserify();
    for (var i = 0; i < files.length; i++) {
      var matches = /(\w+)\.js$/.exec(files[i]);
      b.require(files[i], {expose: matches[1]});
    }
    b.require('xhpjs');
		return b
			.bundle()
			.pipe(source('bundle.js'))
			.pipe(gulp.dest('./build/'));
});

gulp.task('install-php', shell.task([
	'hhvm composer.phar install'
]));

gulp.task('autoload', shell.task([
	'hhvm composer.phar dump-autoload'
]));

gulp.task('serve', shell.task([
    'hhvm -m server -p 8080'
]));

gulp.task('default', ['install-php','browserify','serve']);
