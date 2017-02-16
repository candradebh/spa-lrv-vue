const gulp = require('gulp');
const env = require('gulp-env');
const stringfyObject = require('stringify-object');
const file = require('gulp-file');



gulp.task('app-config', ()=>{
    env({
        file: '.env',
        type: 'ini'
    });
    let spaConfig = require('./app.config');
    let string = stringfyObject(spaConfig);
    return file('config.js',`module.exports = ${string};`,{src:true}).pipe(gulp.dest('./resources/assets'));
});


//console.log(process.env.DB_CONNECTION);