var gulp = require('gulp');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var paths = require('../config').paths;

// Gulp task to minify JavaScript files
gulp.task('js', function() {
    return gulp.src(paths.scripts + '/scripts.js')
    // Minify the file
        .pipe(gulp.dest(paths.dist + '/scripts'))
        .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        // Output
        .pipe(gulp.dest(paths.dist + '/scripts'))
});