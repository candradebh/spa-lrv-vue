import JwtToken from './jwt-token'
import Auth from './auth';
import appConfig from './appConfig'

Vue.http.interceptors.push((request,next)=>{
    request.headers.set('Authorization',JwtToken.getAuthorizationHeader());
    next();
});

Vue.http.interceptors.push((request,next)=>{
    next((response)=>{
        if(response.status ===401){ //token expirado
            return JwtToken.refreshToken().then(()=>{
               return Vue.http(request);//return a responsta da requisição original ou erro
            }).catch(()=> {
                Auth.clearAuth();
                window.location.href = appConfig.url
            });
        }
    });
});

window.axios.defaults.headers.common = {
    //'X-Requested-With': 'XMLHttpRequest',
    'Authorization' : JwtToken.getAuthorizationHeader()
};