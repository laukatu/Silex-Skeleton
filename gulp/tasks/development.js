'use strict';

var config       = require('../config');
var gulp        = require('gulp');
var runSequence = require('run-sequence');

gulp.task('dev', ['clean'], function(cb) {

	cb = cb || function() {};
	global.isProd = false;

	runSequence(['styles', 'images', 'fonts', 'scripts'], cb);

	var styleSources = [];
	var folder = config.styles.srcfolder;
	for(var i = 0; i<config.styles.src.length; i++){
	  styleSources.push(folder+'/'+config.styles.src[i]);
	}

	var scriptSources = [];
	var folder = config.scripts.srcfolder;
	for(var i = 0; i<config.scripts.src.length; i++){
	  scriptSources.push(folder+'/'+config.scripts.src[i]);
	}

	gulp.watch(styleSources, ['styles']);
	gulp.watch(scriptSources, ['scripts']);
	
});