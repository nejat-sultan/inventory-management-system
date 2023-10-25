@extends('layouts.adminpanel')
@section('content')

    <div class="row"> 
        <div class="col-md-12 col-lg-12">
            <h3 class="mb-3" id="titles"> Manage Categories </h3>
            
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-8 col-lg-9">
                            <form class="form-inline my-2 my-lg-0" method="get" action="/searchcategory">
                                <input class="form-control mr-2" name="search" placeholder="Search" value="{{ isset($search) ? $search : ''}}"/>
                                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"> 
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>  
                            </form>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <a href="{{ url('/category/create') }}" class="btn btn-success btn-sm" id="addbutton" title="Add New Category">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New Category
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Name </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $item)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $item->Name }} </td>
                                             
                                        <td>
                                            <a href="{{ url('/category/' . $item->id . '/edit') }}" title="Edit Category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            
                                            <form method="POST" action="{{ url('/category' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $categories->links('pagination::bootstrap-4') }}

                        </div>
 
                    </div>
                </div>
          
        </div>
    </div>



@endsection

