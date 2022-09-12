@extends('layouts.app1', ['activePage' => 'role-assignment', 'titlePage' => __('Role Edit')])

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
                        <a href="/roleassign/{{$role->id}}">
                          <button type="submit" class="btn btn-danger btn-block">Assign Permission </button>
                        </a>

    
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