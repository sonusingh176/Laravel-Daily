export const BASE_URL = 'http://127.0.0.1:8000/api'

export const getConfig = (token) =>{
    console.log(token,"hg")
    const config ={
        headers:{
            "Content-type": "application/json",
            "Authorization":`Bearer ${token}`
        }
    }

    return config

}