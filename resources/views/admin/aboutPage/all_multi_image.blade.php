@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Multi Image</h4><br><br>
                       

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>About Multi Image</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>


                            <tbody>
                                @php
                                $i=1;
                                @endphp
                               
                                @foreach ($multi_image as $item)
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td><img src="{{ asset($item->multi_image) }}" style="width:60px; height:50px" alt=""></td>
                                    <td>
                                        <a href="{{ route('edit.multi.image',$item->id) }}" class="btn btn-info sm me-2" ><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('delete.multi.image',$item->id) }}" id="delete" class="btn btn-danger sm" ><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                   
                                   
                                </tr>
                                @endforeach
                                
                            
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
      
        
    </div> <!-- container-fluid -->
</div>

@endsection