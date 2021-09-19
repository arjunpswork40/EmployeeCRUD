@extends('layouts.dashboard')

@push('styles')
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
               <div class="card-header text-right">
                   <h3 class="card-title "></h3>
                   <a href="{{route('employee.create')}}" class="btn btn-primary">Add Employee</a>
               </div>
                <div class="card-header">
                    <div class="card-title">
                        <form action="{{ route('employee.index') }}">
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" placeholder="Enter Employee Name" value="{{ isset($_GET['name'])?$_GET['name']:'' }}">
                                &nbsp;<input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{ isset($_GET['email'])?$_GET['email']:'' }}">
                                &nbsp;<select id="search_filter_designation_id" class=" form-control select_location_filter" name="designation_id">
                                    <option value="">Select Designation</option>
                                    @foreach($designations as $designation)
                                        <option value="{{$designation->id}}" {{ isset($_GET['designation_id']) && $_GET['designation_id'] != null && $_GET['designation_id'] == $designation->id ? 'selected' : '' }} >{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                                &nbsp;<button type="submit" class="btn btn-sm btn-info"><i class="fa fa-filter"></i> Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="dataTable1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Photo</th>
                            <th class="text-center">Designation</th>
                            
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td style="word-break: break-all" class="text-center">{{ $employee->name }}</td>
                                <td style="word-break: break-all" class="text-center">{{ $employee->email }}</td>
                                <td class="text-center"><img class="user-image img-circle elevation-2" style="width:65px; height:65px;" src="{{ EmployeeHelper::getImagePath($employee->photo)}}"></img></td>
                                <td class="text-center">{{ EmployeeHelper::getDesignationName($employee->designation_id) }}</td>
                                
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{route('employee.edit', $employee->id)}}" class="btn btn-info" title="Edit"><i class="fas fa-edit"></i></a>&nbsp;
                                        <a href="javascript:;" data-href="{{route('employee.destroy', $employee->id)}}" class="btn btn-danger delete" title="Delete"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('bower_components/admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(document).ready(function () {
            var App = {
                initialize: function () {
                    var datatable = $('#dataTable1').DataTable({
                        "paging": true,
                        "lengthChange": true,
                        "searching": false,
                        "ordering": false,
                        "info": true,
                        "autoWidth": false,
                        "aaSorting": [],
                    });
                    $('#dataTable1').on('click', '.delete', function(e) {
                        e.preventDefault();
                        var row = datatable.rows( $(this).parents('tr') );
                        var url = $(this).data('href');
                        App.deleteItem(row, url);
                    })
                },
                deleteItem: function(row, url) {
                    if (confirm('Are you sure you want to remove this Employee?')) {
                        $.ajax({
                            url: url,
                            method: 'DELETE',
                            success : function(data) {
                                row.remove().draw();
                                toastr.success(data.success);
                            }
                        });
                    }
                }
            };
            App.initialize();
        })
    </script>
@endpush
