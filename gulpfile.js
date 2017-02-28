var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

DEST_DIR = './public/compressed/';
JS_FILE = [
    './node_modules/gsap/src/minified/*.min.js',
    '!./node_modules/gsap/src/minified/jquery.gsap.min.js',
    './public/js/main.js'
];
SASS_FILE = './public/sass/';

OTHER_SASS = [
    'node_modules/breakpoint-sass/stylesheets/',
    'node_modules/compass-mixins/lib/'
];

gulp.task('compile:js', function () {
    gulp.src(JS_FILE)
        .pipe(uglify())// before compilation, preserve order
        .pipe(concat('/main.min.js'))
        .pipe(gulp.dest(DEST_DIR));
});

gulp.task('compile:sass', function () {
    gulp.src(SASS_FILE + 'main.scss')
        .pipe(sass({
            includePaths: OTHER_SASS,
            sourceComments: false,
            outputStyle: 'compressed',
            errLogToConsole: true
        }))
        .pipe(concat('/main.min.css'))
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(gulp.dest(DEST_DIR));
});

gulp.task('watch:assets', function() {
    gulp.start('default');
    gulp.watch(JS_FILE, ['compile:js']);
    gulp.watch(SASS_FILE + '**/*.scss', ['compile:sass']);
});

gulp.task('watch:js', function() {
    gulp.start('compile:js');
    gulp.watch(JS_FILE, ['compile:js'])
});

gulp.task('watch:sass', function() {
    gulp.start('compile:sass');
    gulp.watch(SASS_FILE + '**/*.scss', ['compile:sass'])
});

gulp.task('default', ['compile:sass','compile:js']);
