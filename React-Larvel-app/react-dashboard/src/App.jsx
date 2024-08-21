import { useEffect, useState } from "react";
import { BrowserRouter, Route, Routes } from "react-router-dom";

import "./App.css";
import axios from "axios";
import Home from "./components/Home";
import Login from "./components/auth/Login";
import Register from "./components/auth/Register";
import Header from "./components/layouts/Header";
import { BASE_URL, getConfig } from "./helpers/config";
import { AuthContext } from "./context/authContext";

function App() {
  const [accessToken,setAccessToken] =useState(JSON.parse(localStorage.getItem('current_token')));
  const [currentUser,setCurrentUser] = useState(null);

  useEffect(()=>{
    const fetchCurrentlyLoggedInUser =async()=>{
      try {
        const response = await axios.get(`${BASE_URL}/user`,getConfig(accessToken));
        console.log(response);
        setCurrentUser(response.data.user);

      } catch (error) {
        if(error?.response?.status === 401){
          localStorage.removeItem('current_token')
          setCurrentUser(null)
          setAccessToken('')
         
        }
        console.log(error);
        
      }
    };

    if(accessToken) fetchCurrentlyLoggedInUser();

  },[accessToken])

  return (
    <AuthContext.Provider value={{accessToken, setAccessToken,currentUser,setCurrentUser}}>
      <BrowserRouter>
        <Header />
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/login" element={<Login />} />
          <Route path="/register" element={<Register />} />
        </Routes>
      </BrowserRouter>

    </AuthContext.Provider>

  );
}

export default App;
