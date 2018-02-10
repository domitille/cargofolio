// Defining requirements
const gulp = require('gulp');
const plumber = require('gulp-plumber');
const sass = require('gulp-sass');
const cssnano = require('gulp-cssnano');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');
const gulpSequence = require('gulp-sequence');

// gulp sourcemaps + sass
gulp.task('scss', () => {
  gulp.src('./scss/*.scss')
    .pipe(plumber({
      errorHandler(err) {
        console.log(err);
        this.emit('end');
      },
    }))
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(sass())
    .pipe(sourcemaps.write(undefined, { sourceRoot: null }))
    .pipe(gulp.dest('./css'));
});

// Minifies CSS files
gulp.task('min', () => gulp.src('./css/default.css')
  .pipe(sourcemaps.init({ loadMaps: true }))
  .pipe(plumber({
    errorHandler(err) {
      console.log(err);
      this.emit('end');
    },
  }))
  .pipe(rename({ suffix: '.min' }))
  .pipe(cssnano({ discardComments: { removeAll: true } }))
  .pipe(sourcemaps.write('./'))
  .pipe(gulp.dest('./css/')));

gulp.task('build', (callback) => { gulpSequence('scss', 'min', 'jslib')(callback); });
