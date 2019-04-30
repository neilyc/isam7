var gulp = require('gulp'),
concat = require('gulp-concat'),
less = require('gulp-less'),
minifyCSS = require('gulp-minify-css'),
uglify = require('gulp-uglify-es').default;


gulp.task('css', function() {
  gulp.src([
    './web/css/less/styles.less',
  ])
  .pipe(concat('styles.min.css'))
  .pipe(less())
  .pipe(minifyCSS())
  .pipe(gulp.dest('./web/css'));
});

gulp.task('css.admin', function() {
  gulp.src([
    './web/css/less/admin/styles.less',
  ])
  .pipe(concat('styles.min.css'))
  .pipe(less())
  .pipe(minifyCSS())
  .pipe(gulp.dest('./web/css/admin'));
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

gulp.task('js.admin', function() {
  gulp.src([
    // lib
    './web/js/lib/tinymce/lang/*.js',
    './web/js/lib/axios.js',


    // app
    './web/js/app/admin/serie.js',
    './web/js/app/admin/modal.js',
    './web/js/app/admin/app.js'
  ])
  .pipe(concat('app.min.js'))
  .pipe(uglify())
  .pipe(gulp.dest('./web/js/admin/'));
});

gulp.task('watch', function () {
  gulp.watch([
    './web/css/less/**/*.less',
  ], ['css', 'css.admin']);
  gulp.watch([
    './web/js/app/**/*.js',
    './web/js/lib/*.js',
  ], ['js', 'js.admin']);
});

gulp.task('default', [
  'css',
  'css.admin',
  'js',
  'js.admin',
  'watch'
]);