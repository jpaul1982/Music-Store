const gulp        = require('gulp');
const uglify      = require('gulp-uglify');
const rename      = require('gulp-rename');
const concat = require('gulp-concat');
const sass = require('gulp-sass')(require('sass'));

//Roots
const SCSS_SRC    = 'src/scss/*.scss';
const SCSS_DEST   = './dist/css';

const ADMIN_SCSS_SRC    = 'src/scss/admin/*.scss';
const ADMIN_SCSS_DEST   = 'dist/css/';

const JS_SRC    = 'src/js/*.js';
const JS_DEST   = 'dist/js/';

//Compiling SCSS
gulp.task('compile_scss', function(){
    return gulp.src(SCSS_SRC)
        .pipe(sass())
        .pipe(rename({suffix: ''}))
        .pipe(gulp.dest(SCSS_DEST));
});

//Compiling Admin SCSS
gulp.task('compile_admin_scss', function(){
    return gulp.src(ADMIN_SCSS_SRC)
        .pipe(sass())
        .pipe(rename({suffix: ''}))
        .pipe(gulp.dest(ADMIN_SCSS_DEST));
});

//Compiling JS
gulp.task('compile_js', function(){
    return gulp.src(JS_SRC)
        .pipe(concat('main.js'))
        .pipe(gulp.dest(JS_DEST));
});

//Detect changes in SCSS
gulp.task('watch_scss', function(){
    gulp.watch(SCSS_SRC, gulp.series('compile_scss'));
});

//Detect changes in Admin SCSS
gulp.task('watch_admin_scss', function(){
    gulp.watch(ADMIN_SCSS_SRC, gulp.series('compile_admin_scss'));
});

//Detect changes in JS
gulp.task('watch_js', function(){
    gulp.watch(JS_SRC, gulp.series('compile_js'));
});

//Run
gulp.task('dev', gulp.parallel('watch_scss', 'watch_admin_scss', 'watch_js'));