import  { useEffect, useState,useContext } from 'react'
import axios from 'axios'
import { useNavigate } from 'react-router-dom'
import {toast} from 'react-toastify'
import { BASE_URL } from '../../helpers/config'
import useValidation from '../custom/useValidation'
import { Spinner } from '../../utils/Spinner'
import { AuthContext } from '../../context/authContext'


const Register = () => {

  const [name,setName]=useState('')
  const [email,setEmail]=useState('')
  const [password,setPassword]=useState('')

  const [errors,setErrors]=useState('')
  const [loading,setLoading]=useState('')
  const navigate =useNavigate();

  const {accessToken} =useContext(AuthContext);

  useEffect(() => {
    if (accessToken) {navigate('/')}
}, [accessToken ,navigate])


  const handleSubmit = async(e) => {
    e.preventDefault()
    setErrors(null);
    setLoading(true);
    const data={name,email,password}

    try {
      const response = await axios.post(`${BASE_URL}/user/register`,data)
      console.log(response);
      setLoading(false);
      setName('')
      setEmail('')
      setPassword('')
      toast.success(response.data.message)
      navigate('/login')

      
    } catch (error) {
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
              Register
            </h4>
          </div>

          <div className="card-body">
          <form onSubmit={(e)=>handleSubmit(e)}>
              <div className="mb-3">
                <label htmlFor="exampleInputEmail1" className="form-label">Name*</label>
                <input type="text" className="form-control" id="name" onChange={(e)=>setName(e.target.value)}/>
                {useValidation(errors ,'name')}
              </div>

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

export default Register