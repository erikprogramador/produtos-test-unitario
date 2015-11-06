/**
 * Variaveis de dependencias do gulp
*/
var gulp = require('gulp'),
	sass = require('gulp-sass'),
	minify = require('gulp-minify-css'),
	concatCss = require('gulp-concat-css'),
	rename = require('gulp-rename'),
	uglify = require('gulp-uglify'),
	concat = require('gulp-concat');

/**
 * Path variaveis
*/
var publicAssets = './public/assets',
	resourcesAssets = './resources/assets',
	node_modules = './node_modules',
	materialize = node_modules + '/materialize-css',
	jquery = node_modules + '/jquery/dist/jquery.js';

/**
 * Processa o scss, 
*/
gulp.task('scss', function() {

	return gulp.src([
			resourcesAssets + '/scss/style.scss'
		])
	.pipe(sass().on('error', sass.logError))
	.pipe(gulp.dest(resourcesAssets + '/css'));

});

/**
 * Minifica e envia o arquivo css compilado para public
*/
gulp.task('css', ['scss'], function() {
	gulp.src([
			materialize + '/dist/css/materialize.css',
			resourcesAssets + '/css/style.css'
		])
	.pipe(concatCss('app.css'))
	.pipe(minify())
	.pipe(rename('app.min.css'))
	.pipe(gulp.dest(publicAssets + '/css'));
});

/**
 * Concatena os arquivos javascript e minifica enviando-os para pasta public
*/
gulp.task('scripts', function() {
	gulp.src([
			jquery,
			materialize + '/dist/js/materialize.js',
			resourcesAssets + '/js/*.js'
		])
	.pipe(concat('app.js'))
	.pipe(uglify())
	.pipe(rename('app.min.js'))
	.pipe(gulp.dest(publicAssets + '/js'));
});

/**
 * Copia as fontes necessarias para a pasta public
*/
gulp.task('copy-font', function() {
	gulp.src([
			materialize + '/dist/font/roboto/*',
		])
	.pipe(gulp.dest(publicAssets + '/font/roboto'));
});

/**
 * Verifica mudanças e execulta outras tarefas
*/
gulp.task('watch', function() {
	gulp.watch(resourcesAssets + '/scss/**/*.scss', ['css']);
	gulp.watch(resourcesAssets + '/js/**/*.js', ['scripts']);
});

// gulp.src(sourceFiles)
//   .pipe($.copy(outputPath, options));
gulp.task('default', ['css', 'scripts','copy-font']);