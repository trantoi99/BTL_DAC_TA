@extends('admin.masterPageAdmin')
@section('title','DashBoard Page')
@section('main')
 <!-- Page Heading -->
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">
                                Launch demo modal
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Sex</th>
                                            <th>Phone Number</th>
                                            <th>Ca lam viec</th>
                                            <th>Salary</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                            <td></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="staffName">Name</label>
                    <input type="text" class="form-control" id="staffName" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <label for="staffAge">Age</label>
                    <input type="text" class="form-control" id="staffAge" placeholder="Your Age">
                </div>
                <div class="form-group">
                    <label for="staffSex">Sex</label>
                    <input type="text" class="form-control" id="staffSex" placeholder="Your Sex">
                </div>
                <div class="form-group">
                    <label for="staffPhoneNumber">Phone Number</label>
                    <input type="text" class="form-control" id="staffPhoneNumber" placeholder="Your Phone Number">
                </div>
                <div class="form-group">
                    <label for="staffCa">Ca</label>
                    <input type="text" class="form-control" id="staffCa" placeholder="">
                </div>
                <div class="form-group">
                    <label for="staffSalary">Salary</label>
                    <input type="text" class="form-control" id="staffSalary" placeholder="Your Salary">
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@stop()
