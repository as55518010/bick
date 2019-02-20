//引入
var gulp       = require('gulp'),
    concat     = require('gulp-concat'),
    cleanCSS  = require('gulp-clean-css'),
    uglify     = require('gulp-uglify'),
    rename     = require("gulp-rename");

    //  gulp.task('sass', function() { 
    // return gulp.src('./public/static/admin/style/*.scss')
    // .pipe(sass()) 
    // .pipe(minifyCSS())
    // .pipe(gulp.dest('./public/static/admin/style/')); }); 

    //   gulp.task('minify-css', ['sass'], function() { 
    //     return gulp.src('plugins/SoSensational/styles/dest/*.css') 
    //     .pipe(minifyCSS()) 
    //     .pipe(gulp.dest('plugins/SoSensational/styles/dest/')); }); 
    //     gulp.task('watch', function() { 
    //     gulp.watch('plugins/SoSensational/styles/sass/*.scss', ['minify-css']); }); 



//合併檔案css     
gulp.task('concat', function() {
    return gulp.src('./public/static/index/style/*.css')
        .pipe(concat('all.css'))
        .pipe(cleanCSS())
        .pipe(rename('all.min.css'))
        .pipe(gulp.dest('./public/static/index/style/'));
});


//混淆並壓縮 JS
gulp.task('uglify', function() {
    return gulp.src('./public/static/index/style/*.js')
        .pipe(uglify())
        .pipe(rename(function(path) {
            path.basename += ".min";
            path.extname = ".js";
        }))
        .pipe(gulp.dest('./public/static/index/style/'));
});
//啟動工作
gulp.task('default',['concat']);

// //合併檔案css     
// gulp.task('indexconcat', function() {
//     return gulp.src('./public/static/index/style/*.css')
//         .pipe(concat('all.css'))
//         .pipe(cleanCSS())
//         .pipe(rename('all.min.css'))
//         .pipe(gulp.dest('./public/static/index/style/'));
// });


// //混淆並壓縮 JS
// gulp.task('indexuglify', function() {
//     return gulp.src('./public/static/index/style/*.js')
//         .pipe(uglify())
//         .pipe(rename(function(path) {
//             path.basename += ".min";
//             path.extname = ".js";
//         }))
//         .pipe(gulp.dest('./public/static/index/style/'));
// });




//啟動工作
// gulp.task('default',['concat','uglify']);
