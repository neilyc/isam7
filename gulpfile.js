var gulp = require('gulp'),
concat = require('gulp-concat'),
less = require('gulp-less'),
minifyCSS = require('gulp-minify-css'),
uglify = require('gulp-uglify');


gulp.task('css', function() {
  gulp.src([
    './web/css/less/styles.less',
  ])
  .pipe(concat('styles.min.css'))
  .pipe(less())
  .pipe(minifyCSS())
  .pipe(gulp.dest('./web/css'));
});

gulp.task('js', function() {
  gulp.src([
    // lib
    './web/js/lib/modernizr.custom.js',
    './web/js/lib/masonry.pkgd.min.js',
    './web/js/lib/imagesloaded.js',
    './web/js/lib/classie.js',
    './web/js/lib/AnimOnScroll.js',
    './web/js/lib/swiper.min.js',
    // app
    './web/js/app/modal.js',
    './web/js/app/app.js'
  ])
  .pipe(concat('app.min.js'))
  .pipe(uglify())
  .pipe(gulp.dest('./web/js/'));
});

gulp.task('watch', function () {
  gulp.watch([
    './web/css/less/*.less',
  ], ['css']);
  gulp.watch([
    './web/js/app/*.js',
    './web/js/lib/*.js',
  ], ['js']);
});

gulp.task('default', [
  'css',
  'js',
  'watch'
]);