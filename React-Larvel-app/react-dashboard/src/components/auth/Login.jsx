import  { useContext, useEffect, useState } from 'react'
import axios from 'axios'
import { useNavigate } from 'react-router-dom'
import {toast} from 'react-toastify'
import { BASE_URL } from '../../helpers/config'
import useValidation from '../custom/useValidation'
import { Spinner } from '../../utils/Spinner'
import { AuthContext } from '../../context/authContext'

const Login = () => {

  const [email,setEmail]=useState('')
  const [password,setPassword]=useState('')

  const [errors,setErrors]=useState('')
  const [loading,setLoading]=useState('')
  const navigate =useNavigate();

  const {accessToken, setAccessToken,currentUser,setCurrentUser} =useContext(AuthContext);

  useEffect(() => {
    if(accessToken) navigate('/')
  },[accessToken])

  const handleSubmit = async(e) => {
    e.preventDefault()
    setErrors(null);
    setLoading(true);
    const data={email,password}

    try {
      const response = await axios.post(`${BASE_URL}/user/login`,data)
       console.log(response);
       
      if(response.data.error) {
        setLoading(false);
        toast.error(response.data.error)
      }else{
        localStorage.setItem('current_token',JSON.stringify(response.data.currentToken))
        setAccessToken(response.data.currentToken)
        setCurrentUser(response.data.user)
        setLoading(false);
        setEmail('')
        setPassword('')
        toast.success(response.data.message)
        navigate('/')
      }
      console.log(response);

      
    } catch (error) {
      console.log(error);
      setLoading(false)
      if(error?.response?.status === 422){

        setErrors(error.response.data.errors);
      }
      console.log(error);
      
    }

  }

  return (
    <div className='container'>
    <div className="row my-5">
      <div className="col-md-6 mx-auto">
        <div className="card">
          <div className="card-header bg-white">
            <h4 className="text-center mt-2">
              Login
            </h4>
          </div>

          <div className="card-body">
          <form onSubmit={(e)=>handleSubmit(e)}>
         

              <div className="mb-3">
                <label htmlFor="email" className="form-label">Email</label>
                <input type="email" className="form-control" id="email" onChange={(e)=>setEmail(e.target.value)}/>
                {useValidation(errors ,'email')}
              </div>

              <div className="mb-3">
                <label htmlFor="password" className="form-label">Password</label>
                <input type="password" className="form-control" id="password" onChange={(e)=>setPassword(e.target.value)}/>
                {useValidation(errors ,'password')}
              </div>
          
          {
            loading ? <Spinner /> :  <button type="submit" className="btn btn-primary">Submit</button>
          }
             
        </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  )
}

export default Login