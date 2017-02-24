const gulp = require('gulp');
const gulpLoadPlugins = require('gulp-load-plugins');
const runSequence = require('run-sequence');
const concat = require('gulp-concat');
const livereload = require('gulp-livereload');

const $ = gulpLoadPlugins();

var dev = true;

gulp.task('styles', () => {
  return gulp.src('src/scss/*.scss')
    .pipe($.plumber())
    .pipe($.sourcemaps.init())
    .pipe($.sass.sync({
      outputStyle: 'expanded',
      precision: 10,
      includePaths: ['.']
    }).on('error', $.sass.logError))
    .pipe($.autoprefixer({browsers: ['> 1%', 'last 2 versions', 'Firefox ESR']}))
    .pipe($.sourcemaps.write())
    .pipe(gulp.dest('dist/css'))
    .pipe(livereload());
});

gulp.task('scripts', () => {
  return gulp.src('src/js/**/*.js')
    .pipe($.plumber())
    .pipe($.babel())
    .pipe(gulp.dest('dist/js'))
    .pipe(livereload());
});

function lint(files, options) {
  return gulp.src(files)
    .pipe($.eslint({ fix: true }))
    .pipe($.eslint.format())
    .pipe($.eslint.failAfterError());
}

gulp.task('lint', () => {
  return lint('src/js/**/*.js')
    .pipe(gulp.dest('src/js'));
});

gulp.task('images', () => {
  return gulp.src('src/images/**/*')
    .pipe($.cache($.imagemin()))
    .pipe(gulp.dest('dist/images'))
    .pipe(livereload());
});

gulp.task('bowerjs', function() {
  return gulp.src(require('main-bower-files')('**/*.js'))
    .pipe(concat('vendor.js'))
    .pipe(gulp.dest('dist/js'))
    .pipe($.rename('vendor.min.js'))
    .pipe($.uglify())
    .pipe(gulp.dest('dist/js'))
    .pipe(livereload());
});

gulp.task('fonts', () => {
  return gulp.src(require('main-bower-files')('**/*.{eot,svg,ttf,woff,woff2}', function (err) {})
    .concat('src/fonts/**/*'))
    .pipe($.if(dev, gulp.dest('dist/fonts'), gulp.dest('dist/fonts')));
});

gulp.task('build', ['lint', 'bowerjs', 'images', 'fonts'], () => {
  return gulp.src('dist/**/*').pipe($.size({title: 'build', gzip: true}));
});

gulp.task('watch', ['build'], () => {
  livereload.listen();
  gulp.watch('src/scss/**/*.scss', ['styles']);
  gulp.watch('src/js/**/*.js', ['scripts']);
  gulp.watch('src/fonts/**/*', ['fonts']);
  gulp.watch('src/images/**/*', ['images']);
  gulp.watch('bower.json', ['build']);
});

gulp.task('default', () => {
  return new Promise(resolve => {
    dev = false;
    runSequence('build', resolve);
  });
});
