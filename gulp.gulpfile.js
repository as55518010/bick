//引入
var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');
// 合併css
gulp.task('package-css', function () {
  return gulp.src(['public/static/admin/style/animate.css','public/static/admin/style/beyond.css','public/static/admin/style/bootstrap.css','public/static/admin/style/demo.css','public/static/admin/style/font-awesome.css','public/static/admin/style/typicons.css','public/static/admin/style/weather-icons.css'])
        .pipe(concat('bick.css'))
        .pipe(minifyCss())
        .pipe(rename('book.min.css'))
        .pipe(gulp.desc('public/static/admin/style')); ));
	});


// 壓縮js
gulp.task('package-js', function () {
  return gulp.src(['public/static/admin/style/beyond.js','public/static/admin/style/bootstrap.js','public/static/admin/style/jquery.js','public/static/admin/style/jquery_002.js'])
        .pipe(concat('bick.css'))
        .pipe(uglify())
        .pipe(rename('book.min.css'))
        .pipe(gulp.desc('public/static/admin/style')); ));
	});  


//啟動工作
gulp.task('default',['package-css','package-js']function(){

});
