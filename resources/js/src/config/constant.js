export default {
  webBaseURL: process.env.MIX_APP_URL,
  welcome: 'http://192.68.2.130:8000/welcome',
  firebaseConfig: {
    apiKey: '',
    authDomain: '',
    databaseURL: '',
    projectId: '',
    storageBucket: '',
    messagingSenderId: '',
    appId: ''
  },
  auth0Config: {
    domain: '',
    clientID: '',
    // make sure this line is contains the port: 8080
    redirectUri: 'http://localhost:8000/api/auth/login',
    // we will use the api/v2/ to access the user information as payload
    audience: '',
    responseType: 'token id_token',
    scope: 'openid profile'
  }
}
