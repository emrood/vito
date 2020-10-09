import axios from './index'

export default {
  login (userData) {
      let data = {
          grant_type: 'password',
          client_id: process.env.MIX_API_CLIENT_ID,
          client_secret: process.env.MIX_API_CLIENT_SECRET,
          username: userData.email,
          password: userData.password
      }
    return axios.post(process.env.MIX_SENTRY_DSN_API+'oauth/token', data)
  },
  register (userData) {
    return axios.post(process.env.MIX_SENTRY_DSN_API+'api/register', userData)
  },
  jwtLogin (userData) {

    // return axios.post(process.env.APP_URL+'api/auth/login', userData)
    return axios.post('http://192.168.2.130:8000/api/auth/login', userData)
  },
  jwtRegister (userData) {
    return axios.post(process.env.MIX_SENTRY_DSN_API+'api/auth/register', userData)
  }
}
