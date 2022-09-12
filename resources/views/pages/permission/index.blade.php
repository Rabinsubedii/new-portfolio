@extends('layouts.app1', ['activePage' => 'permission_index', 'titlePage' => __('permission Edit')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Permissions</h4>
              <p class="card-category"> Here you can manage permissions</p>
            </div>
            <div class="card-body">
                              <div class="row">
                <div class="col-12 text-right">
                  <a href="{{route('permission.create')}}" class="btn btn-sm btn-primary">Add permission</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <tr><th>
                        Name
                    </th>
                    <th>
                      Assigned To
                    </th>
                    <th>
                      Creation date
                    </th>
                    <th class="text-right">
                      Actions
                    </th>
                    
                    
                  </tr></thead>
                  
                  <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>
                          {{$permission->name}}
                        </td>
                        <td>
                          {{$permission->email}}
                        </td>
                        <td>
                          {{$permission->created_at->toDateString()}}
                        </td>
                        <td class="td-actions text-right">
                            <a rel="tooltip" class="btn btn-success btn-link" href="{{route('permission.edit',['permission'=>$permission->id])}}" data-original-title="" title="">
                              <i class="material-icons">edit</i>
                              <div class="ripple-container"></div>
                            </a>
                            <form action="/permissions/{{$permission->id}}" method='POST'>
                                @csrf
                                @method('DELETE')
                                <a href="{{route('permission.delete',['permission'=>$permission->id])}}"><button type="submit" class="btn btn-danger btn-block">Delete</button></a>
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