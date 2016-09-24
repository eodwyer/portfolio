var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    cssnano = require('gulp-cssnano'),
    rename = require('gulp-rename'),
    concat= require('gulp-concat');
var browserSync = require('browser-sync').create();



/*-----------------------
SASS
--------------------------*/ 
var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'expanded'
};

gulp.task('sass', function () {
 return gulp.src('./scss/**/*.scss')
    .pipe(sass(sassOptions).on('error', sass.logError))
    .pipe(cssnano()) 
    .pipe(rename({suffix: '.min'}))
    .pipe(autoprefixer('last 2 versions'))
    .pipe(gulp.dest('./dist/css'))
    
    
    .pipe(browserSync.reload({
      stream: true
    }));
});

/*-------------------------
JS
--------------------------*/

gulp.task('js', function () {
    return gulp.src(['js/lib/*.js', 'js/site-functions.js'])
        .pipe(concat('main.js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('dist/js'))
        .pipe(browserSync.reload({
          stream: true
        }));
});


/*-------------------------
Watch tasks
--------------------------*/

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "http://localhost:8888/newportfolio/"
    });
});

gulp.task('watch', ['browser-sync', 'sass', 'js'], function (){
  gulp.watch('./scss/**/*.scss', ['sass']); 
  gulp.watch(['js/lib/*.js', 'js/site-functions.js'], ['js']); 
  // Other watchers
});