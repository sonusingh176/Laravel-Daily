import { useContext } from "react";
import { Link } from "react-router-dom";
import { AuthContext } from "../../context/authContext";
import { BASE_URL, getConfig } from "../../helpers/config";
import axios from "axios";
import { toast } from "react-toastify";


const Header = () => {
  
  const {accessToken, setAccessToken,currentUser,setCurrentUser} =useContext(AuthContext);

  const logoutUser =async ()=>{
    try {
      const response = await axios.post(`${BASE_URL}/user/logout`,null,getConfig(accessToken))
      localStorage.removeItem('current_token')
      setAccessToken(null)
      setCurrentUser('')
      toast.success(response.data.message)
      
    } catch (error) {
     
      if(error?.response?.status === 401){
        localStorage.removeItem('current_token')
        setCurrentUser('')
        setAccessToken(null)
      }
      console.log(error);
      
    }

  }


  return (
    <nav className="navbar navbar-expand-lg navbar-light bg-light">
      <div className="container-fluid">
        <Link to="/" className="navbar-brand" >
          React & Larvel Login System
        </Link>
        <button
          className="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span className="navbar-toggler-icon"></span>
        </button>
        <div className="collapse navbar-collapse" id="navbarSupportedContent">
          <ul className="navbar-nav me-auto mb-2 mb-lg-0">

            <li className="nav-item">
              <Link to="/" className="nav-link active" aria-current="page">
                <i className="bi bi-house"></i>
                Home
              </Link>
            </li>
            {currentUser ? (
              <>
                <li className="nav-item">
                  <Link to="#" className="nav-link">
                    <i className="bi bi-person"></i> {currentUser?.name}
                  </Link>
                </li>

                <li className="nav-item">
                  <button className="nav-link btn btn-link" onClick={()=>logoutUser()}>
                    <i className="bi bi-person-fill-down"></i> Logout
                  </button>
                </li>
              </>
            ) : (
              <>
                <li className="nav-item">
                  <Link to="/login" className="nav-link">
                    <i className="bi bi-person-fill-up"></i> Login
                  </Link>
                </li>

                <li className="nav-item">
                  <Link to="/register" className="nav-link">
                    <i className="bi bi-person-add"></i> Register
                  </Link>
                </li>
              </>
            )}
         
         
      
          </ul>
        </div>
      </div>
    </nav>
  );
};

export default Header;
