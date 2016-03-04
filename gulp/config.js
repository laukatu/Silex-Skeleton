'use strict';

module.exports = {
  'styles': {
    'srcfolder': 'src/MyApp/Assets/styles',
    'src' : [
              'vendors/autoinclude/*',
              'development/*'
            ],
    'dest': 'web/assets/css'
  },
  'scripts': {
    'srcfolder': 'src/MyApp/Assets/js',
    'src' : [
              'vendors/jquery.js',
              'vendors/autoinclude/*',
              'development/autoinclude/*',
              'development/main.js'
            ],
    'dest': 'web/assets/js'
  },
  'images': {
    'src' : 'src/MyApp/Assets/images/**/*',
    'dest': 'web/assets/img'
  },
  'fonts': {
    'src' : ['src/MyApp/Assets/fonts/**/*'],
    'dest': 'web/assets/fonts'
  },
  'dist': {
    'root'  : 'web/assets'
  }
};