@extends('layouts.app1', ['activePage' => 'user-management', 'titlePage' => __('Role Edit')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Roles</h4>
              <p class="card-category"> Here you can manage roless</p>
            </div>
            <div class="card-body">
                              <div class="row">
                <div class="col-12 text-right">
                  <a href="{{route('role.create')}}" class="btn btn-sm btn-primary">Add role</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <tr><th>
                        Name
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      Creation date
                    </th>
                    <th class="text-right">
                      Actions
                    </th>
                    
                    
                  </tr></thead>
                  
                  <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>
                          {{$role->name}}
                        </td>
                        <td>
                          {{$role->email}}
                        </td>
                        <td>
                          {{$role->created_at->toDateString()}}
                        </td>
                        <td class="td-actions text-right">
                            <a rel="tooltip" class="btn btn-success btn-link" href="{{route('role.edit',['role'=>$role->id])}}" data-original-title="" title="">
                              <i class="material-icons">edit</i>
                              <div class="ripple-container"></div>
                            </a>
                            <form action="/roles/{{$role->id}}" method='POST'>
                                @csrf
                                @method('DELETE')
                                <a href="{{route('role.delete',['role'=>$role->id])}}"><button type="submit" class="btn btn-danger btn-block">Delete</button></a>
                            </form>
                            
                            
                            
                        </td>
                        <td>
                            
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                </table>
                
              </div>
            </div>
          </div>
         
      </div>
    </div>
  </div>
</div>
  @endsection