@extends('layouts.app1', ['activePage' => 'user-management', 'titlePage' => __('Role Edit')])

@section('content')

    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Users</h4>
              <p class="card-category"> Here you can assign roles to users</p>
            </div>
            <div class="card-body">
                              <div class="row">
                <div class="col-12 text-right">
                  <a  class="btn btn-sm btn-primary">Add user</a>
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
                    @foreach($users as $user)
                    <tr>
                        <td>
                          {{$user->name}}
                        </td>
                        <td>
                          {{$user->email}}
                        </td>
                        <td>
                          {{$user->created_at->toDateString()}}
                        </td>
                        <td class="td-actions text-right">
                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('roleassign',['id'=>$user->id]) }}" data-original-title="" title="">
                              <button class='btn btn-primary'>Assign Role</button>
                              <div class="ripple-container"></div>
                            </a>
                            
                            
                            
                        </td>
                        <td>
                            
                        </td>
                      </tr>
                      @endforeach
                      @if($users->count()<1)
                      <tr>
                        <td>No Data</td>
                      </tr>
                      @endempty
                      {{$users->links()}}
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
