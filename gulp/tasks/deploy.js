'use strict';

var config       = require('../config');
var gulp        = require('gulp');
var runSequence = require('run-sequence');

gulp.task('deploy', ['clean'], function(cb) {

  cb = cb || function() {};
  global.isProd = true;

  runSequence(['styles', 'images', 'fonts', 'scripts'], cb);
  
});
