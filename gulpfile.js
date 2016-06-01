var gulp = require('gulp'),
concat = require('gulp-concat'),
less = require('gulp-less'),
minifyCSS = require('gulp-minify-css'),
uglify = require('gulp-uglify');


gulp.task('styles', function() {
  gulp.src([
    './web/css/less/*.less',
  ])
  .pipe(concat('styles.min.css'))
  .pipe(less())
  .pipe(minifyCSS())
  .pipe(gulp.dest('./web/css'));
});

gulp.task('js', function() {
  gulp.src([
    './web/js/lib/modernizr.custom.js',
    './web/js/lib/masonry.pkgd.min.js',
    './web/js/lib/imagesloaded.js',
    './web/js/lib/classie.js',
    './web/js/lib/AnimOnScroll.js'
  ])
  .pipe(concat('gallery.js'))
  .pipe(uglify())
  .pipe(gulp.dest('./web/js/'));
});

gulp.task('watch', function () {
  gulp.watch([
    './web/css/less/*.less',
  ], ['styles']);
});

gulp.task('default', [
  'styles',
  'js',
  'watch'
]);