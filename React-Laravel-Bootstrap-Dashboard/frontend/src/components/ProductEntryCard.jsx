import React from 'react'

const ProductEntryCard = () => {
  return (
    <div className="card">
        <div className="card-header">
        <ul className="nav nav-tabs" id="myTab" role="tablist">
        <li className="nav-item" role="presentation" >
          <button className="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true" fdprocessedid="p0nvg">Add Main Category</button>
        </li>
        
       
      </ul>
  </div>
    <div className="card-body">
      
     
     

      <div className="tab-content pt-2" id="myTabContent">
        <div className="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <label htmlFor="mainCategory1" className="form-label">Main Category Name</label>

        <div className="input-group">
  <input type="text" placeholder="Enter Category..." className="form-control"/>
  <input type="file" id="file-upload" className="file-input "/>
  <label htmlFor="file-upload" className="btn btn-outline-secondary">
    <img src="upload-icon.png" alt="Upload" className="upload-icon"/>
    Image
  </label>
</div>

        {/* <div className='d-flex'>
            <input type="text" className="form-control" id="mainCategory"/>
            <input className="form-contr" type="file" id="formFile"></input>
        </div> */}
      
        </div>
     
      </div>

    </div>

    <div className="card-footer text-body-secondary">
    <button type="button" className="btn btn-primary">Primary</button>
    <button type="button" className="btn btn-danger">Danger</button>
  </div>
  </div>
  )
}

export default ProductEntryCard