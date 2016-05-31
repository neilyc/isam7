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

gulp.task('jsadmin', function() {
  gulp.src([
    './bower_components/ng-admin/build/ng-admin.min.js',
    './src/AppBundle/Public/js/admin/**/*.js',
  ])
  .pipe(concat('admin.js'))
  .pipe(uglify())
  .pipe(gulp.dest('./web/js'));
});

gulp.task('watch', function () {
  gulp.watch([
    './web/css/less/*.less',
  ], ['styles']);
});

gulp.task('default', [
  'styles',
  'watch'
]);