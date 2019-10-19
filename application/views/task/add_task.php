<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex  align-items-center"> <!-- justify-content-end -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/masterfile/dashboard/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add New Task</li>
                        <li class="breadcrumb-item">
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-5 align-self-center">
            </div>  
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab">
                          <button class="tablinks" onclick="openCity(event, 'add_project')" id="defaultOpen">Add Project</button>
                          <button class="tablinks" onclick="openCity(event, 'project_updates')">Project Updates</button>
                        </div>
                        <div id="add_project" class="tabcontent">
                            <div class="p-25">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="">Select Company</option>
                                                <option>123</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="">Select Department</option>
                                                <option>123</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="">Select Employee</option>
                                                <option>123</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input placeholder="Start Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                                        </div>
                                        <div class="form-group">
                                            <input placeholder="Completion Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                                        </div>
                                        <div class="form-group">                                            
                                            <textarea placeholder="Project Title" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <textarea placeholder="Project Description" class="form-control" rows="8"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="button" value="Save" class="btn btn-success btn-block" name="">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                    <input type="button" value="Add New Project" class="btn btn-primary btn-block" name="">
                                            </div>
                                            <div class="col-lg-6">
                                                    <input type="button" value="Update" class="btn btn-info btn-block" name="">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="project_updates" class="tabcontent">
                            <div class="p-25">
                                <div class="row">
                                    <div class="col-lg-4"> 
                                        <h3 class="proj-title">PROJECT TITLE</h3>
                                        <h6>Start Date:</h6>
                                        <h6>Completion Date:</h6>
                                        <hr>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" placeholder="Remarks"></textarea>
                                        </div>  
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="" placeholder="Status Percentage">
                                        </div>  
                                        <div class="form-group">
                                            <input placeholder="Updated Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                                        </div> 
                                        <div class="form-group">
                                            <input type="button" name="" class="btn btn-success btn-block"  value="Save Update">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="progress progress-bar-animated active">
                                            <div class="progress-bar progress-bar-striped bg-primary " role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
                                        </div>

                                        <div class="table-responsive m-t-10">                            
                                            <table id="myTable" class="table table-hover table-bordered" >
                                                <thead>
                                                    <tr>
                                                        <th width="90%" class="text-center">Date </span></th>
                                                        <th >Update Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">MM-DD-YY</td>
                                                        <td>Desc</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>