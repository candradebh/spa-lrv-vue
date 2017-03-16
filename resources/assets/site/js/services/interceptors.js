
Vue.http.interceptors.push((request,next)=>{
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    //console.log(Laravel.csrfToken);
    //request.headers.set('X-Requested-With', 'XMLHttpRequest');
    next();
});


window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': Laravel.csrfToken,
   // 'X-Requested-With': 'XMLHttpRequest',

};