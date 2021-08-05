<!DOCTYPE html>
<html lang="en">
@include('header.header') 

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini" id="Identity-check">
<div class="wrapper">

@include('navbar.navbar')
  @include('sidebar.sidebar') 

  <div class="content-wrapper">

    <div id="loading"></div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Management Customers / Stores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Management Customers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div id="download_pdf_data" class="container-fluid">
        <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            <div class="card card-danger">
              <div class="card-header back-ops-okp2p">
                <h3 class="card-title">Toolbox</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <a type='button' href="javascript:void(0)" class="btn btn-lg btn-danger" id="create-new-customers"> <span><i class="fas fa-user-plus"></i>  Add Customer</span></a>
                    <a id="toolreset" type='button' href="javascript:void(0)" class="btn btn-lg btn-primary" id="reset-password" onclick="resetpassword($('#id').val())"> <span><i class="fas fa-undo"></i>  Reset Password</span></a>
                    <!-- <a id="toolhapus" type='button' href="javascript:void(0)" class="btn btn-lg btn-primary" id="hapus-customer" onclick="deletecustomer($('#id').val())"> <span><i class="fas fa-trash-alt"></i>  Delete Customer</span></a> -->
                </div>
            </div>
          </div>

          <!--/.col (right) -->
        </div>

        <div class ="row">
          <div class="col-md-12">
                  <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-12" id="tablelistcustomer">

                        <div class="card">
                            <div class="card-header bg-danger back-ops-okp2p">
                                <h3 class="card-title"><b>List Customer </b></h3>
                            </div>

                            <div class="card-body">
                                    <table id="listcustomer" class="table table-striped table-bordered table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th style="display: none">ID</th>
                                                <th>USERNAME</th>
                                                <th>SALES</th>
                                                <th>EMAIL</th>
                                                <th>STORE NAME</th>
                                                <th style="display: none">ID ACCESS</th>
                                                <th style="display: none">STATUS</th>
                                                <th style="display: none">SALES</th>
                                                <th>STATUS</th>
                                                <th>UPDATED AT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                            @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td style="display: none">{{ $customer->id }}</td>
                                                <td>{{ $customer->username }}</td>
                                                <td>{{ $customer->refferal_code }}</td>
                                                <td>{{ $customer->email }}</td>
                                                <td>{{ $customer->store_name }}</td>
                                                <td style="display: none">{{ $customer->permission }}</td>
                                                <td style="display: none">{{ $customer->is_active }}</td>
                                                <td><?php
                                                    if ($customer->is_active) {
                                                        echo '<h6><span class="badge badge-success">Enabled</span></h6>';
                                                    } else {
                                                        echo '<h6><span class="badge badge-danger">Disabled</span></h6>';
                                                    }
                                                ?></td>
                                                 <td style="display: none">{{ $customer->sales_id }}</td>
                                                <td>{{ date('d M Y H:i:s', strtotime($customer->updated_at)) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>

                        </div>

                    </div>
                      <!-- /.card-body -->

                      <!-- left column -->
                    <div class="col-md-4" id="detailcustomer">
                        <div class="card card-danger">
                        <div class="card-header back-ops-okp2p">
                            <h3 class="card-title">Detail Customer</h3>
                        </div>
                        <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" method="POST" action="{{ route('customer-edit') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group">
                                        <label for="username" class="col-sm-12 control-label">Username</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Enter Username" value="" maxlength="50" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="refferal_code" class="col-sm-12 control-label">Refferal Code</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control @error('refferal_code') is-invalid @enderror" id="refferal_code" name="refferal_code" placeholder="Enter Refferal Code" value="" maxlength="50" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-sm-12 control-label">Email</label>
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Mail" value="" maxlength="50" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="permission" class="col-sm-12 control-label">Access</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" id="permission" name="permission" required autocomplete="permission">
                                            <option value="" disabled selected>--choose--</option>
                                            <option value="1">Toko</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="refferal_code" class="col-sm-12 control-label">Store Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control @error('store_name') is-invalid @enderror" id="store_name" name="store_name" placeholder="Enter Follow Store" value="" maxlength="50" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="refferal_code" class="col-sm-12 control-label">Sales</label>
                                        <div class="col-sm-12">
                                      
                                        <select class="form-control" name="sales" required autocomplete="sales"> 
                                        @foreach($getsales as $sales)       
                                            <option value="{{$sales->id}}">{{$sales->name}}</option>
                                            @endforeach  
                                        </select>
                                    

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_active" class="col-sm-12 control-label">Status</label>
                                        <div class="col-sm-12">
                                            <select id="is_active" name="is_active" class="form-control">
                                                <option value="">--- choose Status ---</option>
                                                <option value="0">Disabled</option>
                                                <option value="1">Enabled</option>
                                            </select>

                                            @error('is_active')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" style="color: #dc3545!important" class="col-sm-12 control-label"><i class="fas fa-unlock-alt"></i> Change Password? (optional)</label>
                                        <div class="col-sm-12">
                                            <input type="password" class="form-control is-invalid @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter Password" value="" maxlength="50">
                                        </div>
                                    </div>

                                    <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" value="create">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--/.col (left) -->

                </div>

                </div>
                  <!-- /.col -->
            </div>
                <!-- /.row -->
        </div>
              <!-- /.container-fluid -->
            </section>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    {{-- MODALS --}}
    <div class="modal fade" id="ajax-customers-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="customersCrudModal"></h4>
                </div>
                <div class="modal-body">
                    <form id="customersForm" name="customersForm" class="form-horizontal" method="POST" action="{{ route('customer-store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="username" class="col-sm-12 control-label">Username</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Enter Username" value="{{ old('username') }}" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                                        <label for="refferal_code" class="col-sm-12 control-label">Refferal Code</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control @error('refferal_code') is-invalid @enderror" id="refferal_code" name="refferal_code" placeholder="Enter Refferal Code" value="" maxlength="50" required="">
                                        </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-12 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Mail" value="{{ old('email') }}" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="permission" class="col-sm-12 control-label">Access</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="permission" required autocomplete="permission">
                                    <option value="" disabled selected>--choose Access--</option>
                                    <option value="1">Toko</option>
                                </select>
                            </div>
                        </div>

                            <div class="form-group">
                                        <label for="refferal_code" class="col-sm-12 control-label">Store Name</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control @error('store_name') is-invalid @enderror" id="store_name" name="store_name" placeholder="Enter Follow Store" value="" maxlength="50" required="">
                                        </div>
                            </div>
                            <div class="form-group">
                                        <label for="refferal_code" class="col-sm-12 control-label">Sales</label>
                                        <div class="col-sm-12">
                                      
                                        <select class="form-control" name="sales" required autocomplete="sales">  
                                        @foreach($getsales as $sales)      
                                            <option value="{{$sales->id}}">{{$sales->name}}</option>
                                            @endforeach    
                                        </select>
                                        
                                        </div>
                            </div>

                        <div class="form-group">
                            <label for="is_active" class="col-sm-12 control-label">Status</label>
                            <div class="col-sm-12">
                                <select name="is_active" class="form-control">
                                    <option value="">--- choose Status ---</option>
                                    <option value="0">Disabled</option>
                                    <option value="1">Enabled</option>
                                </select>

                                @error('is_active')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" class="btn btn-danger" id="btn-save" value="create">Add
                         </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('footer.tag-footer')
</div>
@include('footer.footer')
</body>
</html>

@include('js.alert-toast')

@include('js.toast-info')

<script>
    var table

    $(document).ready( function () {
        $('#detailcustomer').hide()
        $('#toolreset').hide()
        $('#toolhapus').hide()
        document.getElementById("tablelistcustomer").className = "col-md-12";

        table = $('#listcustomer').DataTable();

        $('#listcustomer tbody').on( 'click', 'tr', function () {
debugger
            var datacustomer = table.row( this ).data()
            $('#detailcustomer').show()
            $('#toolreset').show()
            $('#toolhapus').show()
            document.getElementById("tablelistcustomer").className = "col-md-8";
            $('#id').val(datacustomer[1])
            $('#username').val(datacustomer[2])
            $('#refferal_code').val(datacustomer[3])
            $('#email').val(datacustomer[4])
            $('#permission').val(datacustomer[6])
            $('#sales').val(datacustomer[9])
            

        } );

        $('#listcustomer tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('row_selected') ) {
                $(this).removeClass('row_selected')

                $('#detailcustomer').hide()
                $('#toolreset').hide()
                $('#toolhapus').hide()
                document.getElementById("tablelistcustomer").className = "col-md-12";
                $('#id').val('')
                $('#username').val('')
                $('#refferal_code').val('')
                $('#email').val('')
                $('#permission').val('')
            }
            else {
                table.$('tr.row_selected').removeClass('row_selected');
                $(this).addClass('row_selected')
            }
        } );

        /*  When Customer click add customer button */
        $('#create-new-customers').click(function () {
            $('#btn-save').val("customers")
            $('#id').val('')
            $('#customersForm').trigger("reset")
            $('#customersCrudModal').html("Add Customer / Store")
            $('#ajax-customers-modal').modal('show')
        });
    });

    function deletecustomer(id)
    {
        var uid = $('#uid').val()
        if (id == uid) {
            rejectdelete()
        } else {
            fixdelete(id)
        }
    }

    function fixdelete(id)
    {
        var username = $('#username').val()
        var email = $('#email').val()
        Swal.fire({
            title: 'Are you sure you are deleting this data?',
            html:
            "Username : <b>"+username+"</b> </br> " +
            "Email : <b>"+email+"</b> </br>  </br> " +
            "You won't be able to return this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: "customers-list/delete/"+id,
                    success: function (data) {
                        Swal.fire(
                            'Deleted!',
                            'Customer data has been successfully deleted',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload()
                            }
                        })
                    },
                    error: function (data) {
                        Swal.fire(
                            'Error!',
                            'Failed to delete customer data',
                            'error'
                        )
                        console.log('Error:', data);
                    }
                });
            }
        })
    }

    function rejectdelete()
    {
        Swal.fire(
            'Error!',
            'Cant delete your own account!',
            'error'
        )
    }

    function resetpassword(id)
    {
        var username = $('#username').val()
        var email = $('#email').val()
        Swal.fire({
            title: 'Reset the password for this data?',
            html:
            "Nama : <b>"+username+"</b> </br> " +
            "Email : <b>"+email+"</b> </br>  </br> " +
            "Password akan kembali ke default!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, reset it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: "customers-list/resetpassword/"+id,
                    success: function (data) {
                        Swal.fire(
                            'Reset successfully!',
                            'Customer password has been successfully reset',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload()
                            }
                        })
                    },
                    error: function (data) {
                        Swal.fire(
                            'Error!',
                            'Failed to reset customer password',
                            'error'
                        )
                        console.log('Error:', data);
                    }
                });
            }
        })
    }

</script>
