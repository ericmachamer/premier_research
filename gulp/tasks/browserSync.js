var gulp = require('gulp');
var browserSync = require('browser-sync');
var domain = require('../config').domain;
var paths = require('../config').paths;

gulp.task('browserSync', ['watch'], function () {
    browserSync({
        proxy: domain,
        open: false,
        injectChanges: true,
        watchEvents: [ 'change', 'add', 'unlink', 'addDir', 'unlinkDir' ],
        files: [
            paths.dist + '/**',
            // Exclude Map files
            '!' + paths.dist + '/**.map'
        ]
    });
});
