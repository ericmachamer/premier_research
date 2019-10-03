var gulp = require('gulp');
var gutil = require('gulp-util');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var cleanCSS = require('gulp-clean-css');
var rename = require('gulp-rename');
var plumber = require('gulp-plumber');
var browserSync = require('browser-sync');
var handleErrors = require('../util/handleErrors');
var paths = require('../config').paths;
var tildeImporter = require('node-sass-tilde-importer');

var dest = paths.dist + '/styles';

gulp.task('styles', function () {
    return gulp.src([paths.styles + '/styles.scss'])
        .pipe(plumber({
            errorHandler: handleErrors
        }))
        .pipe(sourcemaps.init())
        .pipe(sass({
            importer: tildeImporter
        }))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'Opera 12.1', 'ios 6', 'android 4'))
        .pipe(gulp.dest(dest))
        .pipe(cleanCSS())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest(dest));
});
